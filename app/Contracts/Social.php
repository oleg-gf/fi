<?php

namespace App\Contracts;
use Laravel\Socialite\Contracts\User as UserSocialContract;

interface Social
{
    public function authUser(UserSocialContract $socialUser): string;

}
