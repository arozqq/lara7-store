<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Socialite;
use App\{User, Profile};

class OAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleProviderCallback($provider)
    {
        try {

            $user = Socialite::driver($provider)->stateless()->user();

            $finduser = User::where('provider_id', $user->id)->first();

            // sudah daftar
            if ($finduser) {

                Auth::login($finduser);

                return redirect('/')->with('success', 'You are Logged in');
            } else {
                // daftar   
                $newUser = User::firstOrCreate([
                    'name' => $user->getName(),
                    'username' => Str::slug($user->getName()),
                    'email' => $user->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $user->id,
                    'role' => 'user',
                    'password' => bcrypt('password123'),
                    'email_verified_at' => now(),
                ]);
                $newUser->profile()->save(new Profile);
                Auth::login($newUser);

                return redirect('/')->with('success', "Get Started!");
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors("Akun atau Email mungkin sudah digunakan oleh orang lain!");
        }
    }
}
