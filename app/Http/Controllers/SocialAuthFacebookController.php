<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\Services\SocialFacebookAccountService;

class SocialAuthFacebookController extends Controller
{
    /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service, Request $request)
    {
        try {
            if (!$request->has('code') || $request->has('denied')) {
                return redirect('/');
            }
            $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
            auth()->login($user);
            if ($user->is_admin) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('user.dashboard');
            }
        } catch (\Exception $e) {
            \Log::info('Error while login ' . $e->getMessage());
            return redirect('/');
        }
    }
}
