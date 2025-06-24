<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }

        // ✅ Buat token manual
        $token = app('auth.password.broker')->createToken($user);

        // ✅ Buat URL reset manual
        $resetUrl = url(route('password.reset', [
            'token' => $token,
            'email' => $user->email,
        ]));

        return back()->with('status', "<a href='$resetUrl'>$resetUrl</a>");
    }
}
