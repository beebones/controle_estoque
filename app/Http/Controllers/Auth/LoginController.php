<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function receiveDataGoogle(){
        $userGoogle = Socialite::driver('google')->user();
        $userDB = $this->findOrCreateUser($userGoogle);

        Auth::login($userDB, true);
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($userGoogle){
        $user = User::where('email', $userGoogle->email)->first();

        if($user){
            return $user;
        }
        $newUser = new User();
        $newUser->name = $userGoogle->name;
        $newUser->email = $userGoogle->email;
        $newUser->img_profile = $userGoogle->avatar;
        $newUser->provider_id = $userGoogle->id;
        $newUser->active = 1;
        $newUser->save();
        return $newUser;
    }
}
