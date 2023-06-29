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

            return redirect('home')->with('success' , 'ログインが出来ました。');
            
        }
        session()->put('name','aaaa');
        
        return back()->with('danger' , 'メールアドレスかパスワードが間違っています。',
        );
   }
   public function logout(Request $request)
   {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('top')->with('success' , 'ログインアウトが完了しました');
   }
   //新規登録画面
   public function showRegister()
   {
    return view('login.register');
   }
}
