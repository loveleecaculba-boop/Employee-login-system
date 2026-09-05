<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'employee_id' => [
                'required',
                'string',
                'regex:/^[0-9]{2}-[0-9]{6}$/',
                'unique:users,employee_id',
            ],

            'branch' => [
                'required',
                Rule::in(['Pasig', 'Mandaluyong', 'Manila']),
            ],

            'username' => 'required|string|max:50|unique:users,username',

            'email' => 'required|email|max:255|unique:users,email',

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
            ],
        ], [
            'employee_id.required' => 'Employee ID is required.',
            'employee_id.regex' => 'Employee ID must follow the format XX-XXXXXX using numbers only.',
            'employee_id.unique' => 'This Employee ID is already registered.',

            'branch.required' => 'Branch is required.',
            'branch.in' => 'Please select a valid branch: Pasig, Mandaluyong, or Manila.',

            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, and one number.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'employee_id' => $request->employee_id,
            'branch' => $request->branch,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'user',
        ]);

        AuditLog::create([
            'user_id' => $user->id,
            'action' => 'registration',
            'description' => 'New employee account registered.',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect('/login')->with(
            'success',
            'Account created successfully. Please log in.'
        );
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginField = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        if (Auth::attempt([
            $loginField => $credentials['login'],
            'password' => $credentials['password'],
        ])) {

            $request->session()->regenerate();

            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'login',
                'description' => 'User successfully logged in.',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'login' => 'The provided credentials are incorrect.',
        ])->onlyInput('login');
    }

    /*
    |--------------------------------------------------------------------------
    | Admin Login
    |--------------------------------------------------------------------------
    */

    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginField = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        if (Auth::attempt([
            $loginField => $credentials['login'],
            'password' => $credentials['password'],
            'role' => 'admin',
        ])) {

            $request->session()->regenerate();

            AuditLog::create([
                'user_id' => Auth::id(),
                'action' => 'admin_login',
                'description' => 'Administrator successfully logged in.',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect('/admin');
        }

        return back()->withErrors([
            'login' => 'Invalid administrator credentials.',
        ])->onlyInput('login');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            AuditLog::create([
                'user_id' => $user->id,
                'action' => 'logout',
                'description' => 'User logged out.',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}