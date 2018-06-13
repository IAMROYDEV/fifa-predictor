<?php

namespace App\Services;

use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Service\SlackService;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();
            if(!$user) {
                $socialfacebookapp = SocialFacebookAccount::where('provider_user_id', $providerUser->getId())->first();
                if($socialfacebookapp) {
                    $user = $socialfacebookapp->user;
                }
            }
            if (!$user) {
                $user = User::create([
                    'email' => ($providerUser->getEmail()) ? $providerUser->getEmail() : $providerUser->getId(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1, 10000)),
                    'avatar' => $providerUser->getAvatar()
                ]);
                SlackService::sendMessage("new user registered \nname *{$user->name}*\nemail {$user->email}");
            }

            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}
