<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();

            $existingUser = User::where('github_id', $user->id)->first();

            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'github_id' => $user->id,
                    'password' => encrypt('github123')  // Using a placeholder password
                ]);

                Auth::login($newUser);
            }

            return redirect()->intended('/dashboard');  // Redirect to dashboard after successful login
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'GitHub login failed. Please try again.');
        }
    }
}
