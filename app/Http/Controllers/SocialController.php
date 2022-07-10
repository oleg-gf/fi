<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Contracts\Social as SocialContract;

class SocialController extends Controller
{
    public function index(string $network)
    {
        return Socialite::driver($network)->redirect();
    }

    public function callback(string $network, SocialContract $social)
    {
        $user = Socialite::driver($network)->user();
        $accessTokenResponseBody = $user->accessTokenResponseBody;
        $user['network'] = $network;

        return $social->authUser($user);
    }
}
