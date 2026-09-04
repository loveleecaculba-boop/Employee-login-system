<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, and one number.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'user',
        ]);

        AuditLog::create([
            'user_id' => $user->id,
            'action' => 'registration',
            'description' => 'New user account registered.',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Redirect to login instead of automatically logging in
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