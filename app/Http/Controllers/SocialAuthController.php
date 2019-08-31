<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use App\User;
use Socialite;

//use Auth;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }
    
    public function redirects()
    {
        return Socialite::driver('google')->redirect();   
    }   

    public function callbackG(SocialAccountService $service)
    {
        $user = $service->createOrGetUserG(Socialite::driver('google')->user());
		$user = User::find($user->id);
		$user->last_login_at = date('Y/m/d H:i:s');
		$user->last_login_ip = \Request::ip();
		$user->save();
        //return $user;
		//$lang = Session::get('lang'); 
		//return $lang;
        auth()->login($user);
        //return $user = Auth::user();
        if(Session::has('cart') || count(Session::get('cart')) > 1 ){
           
            //if($lang == 'en'){
               
            //    return redirect('en/cart'); 
            //}else{
                return redirect('cart');
            //}
           
        }
        //if($lang == 'en'){
        //    return redirect('en/member'); 
        //}else{
            return redirect('member');
        
    }   

    public function callback(SocialAccountService $service)
    {
        
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
		$user = User::find($user->id);
		$user->last_login_at = date('Y/m/d H:i:s');
		$user->last_login_ip = \Request::ip();
		$user->save();
        //return $user;
		//$lang = Session::get('lang'); 
		//return $lang;
        auth()->login($user);
        //return $user = Auth::user();
        if(Session::has('cart') || count(Session::get('cart')) > 1 ){
           
            //if($lang == 'en'){
               
            //    return redirect('en/cart'); 
            //}else{
                return redirect('cart');
            //}
           
        }
        //if($lang == 'en'){
        //    return redirect('en/member'); 
        //}else{
            return redirect('member');
        //}
       
        // when facebook call us a with token   
        //$user = Socialite::driver('facebook')->user();
         //$providerUser = \Socialite::driver('facebook')->user(); 
        //$token = $user->token; //token
        //$user->getId(); //FB ID
        //$user->getNickname();
        //$user->getName(); //姓名
        //$user->getEmail(); //Mail
        //$user->getAvatar();
        //return $user->getId(); //姓名
    }
}
