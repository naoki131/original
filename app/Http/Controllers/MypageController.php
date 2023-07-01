<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileEditRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class MypageController extends Controller
{
    //ユーザー情報変更画面
   public function showMypage()
   {
    return view('Mypage.mypage');
   }
   //ユーザー情報の変更処理
   public function profileEdit(ProfileEditRequest $request)
   {
    $user=Auth::user();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    
    $user->save();
    return redirect()->back()->with('success', '登録情報を変更いたしました');
   }

   //パスワード変更画面
   public function showPassword()
   {
    return view('Mypage.password');
   }

   public function editPassword(PasswordRequest $request)
   {
    $user=Auth::user();
    if (Hash::check($request->input('password1'),$user->password )) {
        $user->password =$request->input('password2');
        $user->save();

        session()->put('password1',$request->input('password1'));
        return redirect()->back()->with('success','パスワードを変更いたしました。');
    }
    session()->put('password2',$request->input('password2'));
    return back()->with('danger','パスワードが違います');
   }
}
