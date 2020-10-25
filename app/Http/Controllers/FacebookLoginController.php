<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;
use App\User;
class FacebookLoginController extends Controller
{
    public function index(){
        return view("facebook");
    }
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $uInfo = Socialite::driver($provider)->stateless()->user();
        $user = $this->findOrCreate($uInfo,$provider);
        auth()->login($user);
        return redirect("/mypage");
    }

    function findOrCreate($uInfo,$provider){
        $user = User::where('provider_id', $uInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $uInfo->name,
                'email'    => $uInfo->email,
                'photo'    =>$uInfo->avatar_original,
                'provider' => $provider,
                'provider_id' => $uInfo->id
            ]);
        }
        return $user;
    }
}
