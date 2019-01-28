<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Socialite;

class AuthController extends Controller
{
    protected $redirectTo = '/home';
    
     public function redirectToProvider($provider)
     {
         return Socialite::driver($provider)->redirect();
     }
 
     
     public function handleProviderCallback($provider)
     {
         $user = Socialite::driver($provider)->user();
 
         $authUser = $this->findOrCreateUser($user, $provider);
         Auth::login($authUser, true);
         return redirect($this->redirectTo);
     }
 
    
     public function findOrCreateUser($user, $provider)
     {
         $authUser = User::where('provider_id', $user->id)->first();
         if ($authUser) {
             return $authUser;
         }
         return User::create([
             'name'     => $user->name,
             'email'    => $user->email,
             'provider' => $provider,
             'provider_id' => $user->id
         ]);
     }
}
