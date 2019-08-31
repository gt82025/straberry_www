<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Model\SocialAccount;
use App\Model\UserCategory;
use App\Model\Bonus;
use App\User;

class SocialAccountService
{
    public function createOrGetUserG(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('google')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        //return $account;

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google',
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail()
            ]);
			
			$user = '';
			if($providerUser->getEmail()){
				$user = User::whereEmail($providerUser->getEmail())->first();
			}else{
				$user = User::whereProviderUserId($providerUser->getId())->first();
			}

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
					'provider_user_id' => $providerUser->getId(),
                    'fb_id' => $providerUser->getName(),
                    'password' => bcrypt($providerUser->getId())
                ]);

                $category = UserCategory::find(1);
                /*
                if($category->bonus_register > 0) {
                    $bonus = new Bonus;
                    $bonus->published_at = date('Y/m/d H:i:s');
                    $bonus->user_id = $user->id;
                    $bonus->intro = '會員註冊紅利回饋'.$category->bonus_register.'點';
                    $bonus->get_bonus = $category->bonus_register;
                    $bonus->save();
                }
                */
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }

    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        
        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook',
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail()
            ]);
			
			$user = '';
			if($providerUser->getEmail()){
				$user = User::whereEmail($providerUser->getEmail())->first();
			}else{
				$user = User::whereProviderUserId($providerUser->getId())->first();
			}

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
					'provider_user_id' => $providerUser->getId(),
                    'fb_id' => $providerUser->getName(),
                    'password' => bcrypt($providerUser->getId())
                ]);

                $category = UserCategory::find(1);
                /*
                if($category->bonus_register > 0) {
                    $bonus = new Bonus;
                    $bonus->published_at = date('Y/m/d H:i:s');
                    $bonus->user_id = $user->id;
                    $bonus->intro = '會員註冊紅利回饋'.$category->bonus_register.'點';
                    $bonus->get_bonus = $category->bonus_register;
                    $bonus->save();
                }
                */
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}
