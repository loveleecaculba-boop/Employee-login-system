<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'employee_id' => [
                'required',
                'string',
                'regex:/^[0-9]{2}-[0-9]{6}$/',
                'unique:users,employee_id,' . $user->id,
            ],

            'branch' => [
                'required',
                Rule::in(['Pasig', 'Mandaluyong', 'Manila']),
            ],

            'username' => [
                'required',
                'string',
                'max:50',
                'unique:users,username,' . $user->id,
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],
        ], [
            'employee_id.required' => 'Employee ID is required.',
            'employee_id.regex' => 'Employee ID must follow the format XX-XXXXXX using numbers only.',
            'employee_id.unique' => 'This Employee ID is already registered.',
            'branch.required' => 'Branch is required.',
            'branch.in' => 'Please select a valid branch: Pasig, Mandaluyong, or Manila.',
        ]);

        $user->update($validated);

        AuditLog::create([
            'user_id' => $user->id,
            'action' => 'profile_update',
            'description' => 'User updated their profile information.',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect('/profile')->with(
            'success',
            'Profile updated successfully.'
        );
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        // Only employees can use this feature.
        abort_if($user->role === 'admin', 403, 'This feature is for employees only.');

        $validated = $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'different:current_password',
            ],
        ], [
            'current_password.current_password' => 'Your current password is incorrect.',
            'password.min' => 'Your new password must be at least 8 characters.',
            'password.confirmed' => 'The new password confirmation does not match.',
            'password.regex' => 'Your new password must contain at least one uppercase letter, one lowercase letter, and one number.',
            'password.different' => 'Your new password must be different from your current password.',
        ]);

        // Save the new password using Laravel's secure hashing.
        $user->password = Hash::make($validated['password']);
        $user->save();

        AuditLog::create([
            'user_id' => $user->id,
            'action' => 'password_change',
            'description' => 'User changed their password.',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect('/profile')->with(
            'success',
            'Password updated successfully.'
        );
    }
}
