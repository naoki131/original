<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('home')->with('success', 'ログインが出来ました。');
        }
        session()->put('name', 'aaaa');

        return back()->with(
            'danger',
            'メールアドレスかパスワードが間違っています。',
        );
    }
    public function logout(Request $request)
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('top')->with('success', 'ログアウトが完了しました');
    }
    //新規登録画面
    public function showRegister()
    {
        session()->put('aa', Auth::check());
        return view('login.register');
    }
    public function register(LoginFormRequest $request)
    {
        //既にメールアドレスを使われているかの判断
        $check = User::where('email', $request->input('email'))->count();
        
        if ($check===0) {
        //ユーザー情報の登録
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->save();

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect('home')->with('success', '会員登録が出来ました。');
            }
        }
        //既にメールアドレスを使われていたら、登録不可能。
        return back()->with('danger','このメールアドレスは既に使われております。',
        );
    }
}
