<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    * @return View
    */ 
   public function showLogin()
   {
        return view('login.login_form');
   }

   //ログイン機能
   public function login(LoginFormRequest $request)
   {
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('home')->with('login_success' , 'ログインが出来ました。');
            
        }
        session()->put('name','aaaa');
        
        return back()->with(
            'login_error' , 'メールアドレスかパスワードが間違っています。',
        );
   }
}
