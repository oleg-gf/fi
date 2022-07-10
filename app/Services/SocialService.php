<?php

namespace App\Services;

use App\Models\User;
use App\Models\Social;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Social as SocialContract;
use Laravel\Socialite\Contracts\User as UserSocialContract;

class SocialService implements SocialContract
{
    public function authUser(UserSocialContract $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if ($user) {
            $userSocial = Social::firstOrCreate(
                    ['name' => $socialUser['network'], 'user_id' => $user->id],
                    ['nickname' => $socialUser->getName(),
                    'id_in_social' => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar()]
            );
            Auth::loginUsingId($user->id);
            return redirect(route('account.index'));
        } else {
            return redirect(route('register'));
        }

    }
}

