<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class PasswordResetController extends Controller
{
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();

        if (!$user) {
            return back()
                ->withErrors([
                    'email' => 'No account was found with that email address.',
                ])
                ->withInput();
        }

        // Generate a reset token.
        $token = Str::random(64);

        // Replace any existing reset token for this email.
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        // Local testing only: display the reset link instead of sending an email.
        $resetLink = url('/reset-password/' . $token)
            . '?email=' . urlencode($request->email);

        return back()->with([
            'status' => 'A local password reset link has been generated.',
            'resetLink' => $resetLink,
        ]);
    }

    public function showResetPassword(Request $request, string $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->query('email'),
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => ['required', 'string'],
            'email' => ['required', 'email'],
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

        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (
            !$resetRecord ||
            !Hash::check($request->token, $resetRecord->token) ||
            Carbon::parse($resetRecord->created_at)->addMinutes(60)->isPast()
        ) {
            return back()
                ->withErrors([
                    'email' => 'The password reset link is invalid or has expired. Please request a new one.',
                ])
                ->withInput($request->only('email'));
        }

        $updated = DB::table('users')
            ->where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
                'updated_at' => Carbon::now(),
            ]);

        if (!$updated) {
            return back()->withErrors([
                'email' => 'Unable to reset the password. Please try again.',
            ]);
        }

        // Delete the token so it cannot be reused.
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        return redirect('/login')->with(
            'success',
            'Your password has been reset successfully. You may now log in.'
        );
    }
}
