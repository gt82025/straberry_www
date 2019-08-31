<?php 
namespace App\Http\Controllers\Aida;

use Auth;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller {

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function login(request $request)
    {
        if (Auth::guard('heimdallr')->attempt(['email' => $request->username, 'password' => $request->password]))
        {
            return redirect('AIDA/MANAGE');
        }
        return redirect('AIDA')->with('message', '帳號密碼錯誤');
    }

    public function showLoginForm(){

        if(view()->exists('auth.authenticate')){
            return view('auth.authenticate');
        }

        return view('aida.login');
    }

    public function logout(){
        //$user = Auth::user();
        Auth::guard('heimdallr')->logout();
        return redirect('AIDA');
    }

}