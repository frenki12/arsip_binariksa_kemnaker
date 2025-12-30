<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // Arahkan user ke halaman login Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google setelah login berhasil
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cek apakah user sudah ada di database
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Jika belum ada, buat user baru
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt('google_login_' . $googleUser->getId()),
                ]);
            }

            // Login user
            Auth::login($user);

            // Redirect ke dashboard
            return redirect()->route('dashboard_admin');

        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'Login Google gagal, coba lagi.']);
        }
    }
}
