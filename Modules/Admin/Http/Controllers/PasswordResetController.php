<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Modules\Admin\Entities\PasswordReset;
use Modules\Admin\Emails\ResetPasswordMail;
use Illuminate\Contracts\Support\Renderable;

class PasswordResetController extends Controller
{
    public function forgotPassword()
    {
        return view('admin::forgot-password');
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('success', 'Ellenőrízd az emailed a jelszó frissítési linkért.');
        }

        // Generate a unique token
        $token = Str::random(60);

        // Save the token in the password_resets table
        PasswordReset::create([
            'email' => $user->email,
            'token' => $token,
        ]);

        // Send an email to the user with the reset link
        Mail::to($user->email)->send(new ResetPasswordMail($token));

        return redirect()->back()->with('success', 'Ellenőrízd az emailed a jelszó frissítési linkért.');
    }

    public function showResetForm($token)
    {
        // Check if the token exists and is still valid (e.g., within a certain time frame)
        $passwordReset = PasswordReset::where('token', $token)->first();

        if (!$passwordReset || now()->diffInMinutes($passwordReset->created_at) > 60) {
            return view('admin::expired'); // Display an error message for expired or invalid tokens
        }

        return view('admin::reset-password', compact('token'));
    }

    public function reset(Request $request, $token)
    {
        // Validate the token and update the user's password
        $passwordReset = PasswordReset::where('token', $token)->first();

        if (!$passwordReset || now()->diffInMinutes($passwordReset->created_at) > 60) {
            return view('admin::expired'); // Display an error message for expired or invalid tokens
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            return view('admin::expired');
        }

        $request->validate([
            'password' => 'required|confirmed',
        ]);

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Delete the password reset token from the database
        $passwordReset->delete();

        return redirect()->route('admin.user.index');
    }
}
