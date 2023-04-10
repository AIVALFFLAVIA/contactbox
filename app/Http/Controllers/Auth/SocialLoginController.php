<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Models\User;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SocialLoginController extends Controller
{
    public function __construct(){

        $this->middleware(['social', 'guest']);
    }
   
    public function redirect ($service, Request $request){
        return Socialite::driver($service)->redirect();
    }

    public function callback($service, Request $request){
        try {
            $serviceUser = Socialite::driver($service)->user();
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            $serviceUser = Socialite::driver($service)->stateless()->user();
        }
       
        
        $user = $this->getExistingUser($serviceUser, $service);
     
        if (!$user){
            $user = User::create([
                'name' => $serviceUser->getName() ? $serviceUser->getName() : 'User Name',
                'email' => $serviceUser->getEmail(),
            ]);
        }

        if ($this->needsToCreateSocial($user, $service)){
            $user->social()->create([
                'social_id' =>$serviceUser->getId(),
                'service' => $service,
            ]);
        }

        Auth::login($user, false);

        return redirect()->route('dashboard');
    }

    protected function needsToCreateSocial($user, $service){
        return !$user->hasSocialLinked($service);
    }


    protected function getExistingUser($serviceUser, $service){

        return User::where('email', $serviceUser->getEmail())->orWhereHas('social', function($q) use ($serviceUser, $service) {
            $q->where('social_id', $serviceUser->getId())->where('service',$service);
        })->first();
    }
}
