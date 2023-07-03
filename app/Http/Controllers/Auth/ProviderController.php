<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $SocialUser = Socialite::driver($provider)->user();
            if (User::where('email', $SocialUser->getEmail())->where('provider',null)->exists()) {
                return redirect('/login')->withErrors(['email' => 'Cet email a déjà un compte!']);
            }
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $SocialUser->id,
            ])->first();
            if (!$user) {
                $user = $provider == 'github' ? User::updateOrCreate([
                    'provider_id' => $SocialUser->id,
                    'provider' => strtoupper($provider),
                ], [
                    'prenom' => $SocialUser->nickname,
                    'nom' => ($SocialUser->name == null) ? '' : $SocialUser->name,
                    'email' => $SocialUser->email,
                    'provider_token' => $SocialUser->token,
                    'role' => 'client'
                ]) : User::updateOrCreate([
                    'provider_id' => $SocialUser->id,
                    'provider' => strtoupper($provider),
                ], [
                    'prenom' => $SocialUser->user['given_name'],
                    'nom' => $SocialUser->user['family_name'],
                    'email' => $SocialUser->email,
                    'provider_token' => $SocialUser->token,
                    'role' => 'client'
                ]);
            }




            Auth::login($user);

            return redirect('/');
        } catch (\Exception $e) {
            print($e);
            dd();
            return redirect('/login');
        }
        // dd($user);

    }
}
