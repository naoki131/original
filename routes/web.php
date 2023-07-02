<?php

use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MypageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//新規登録画面
Route::get('/register',[AuthController::class,'showRegister'])->name('register');
//新規登録をする。
Route::post('/register',[AuthController::class,'register'])->name('register');

//ミドルウエア
Route::group(['middleware' =>['guest']],function(){
    //top画面
    Route::get('/top',[TopController::class ,'topShow'])->name('top');
    //ログイン画面の出力
    Route::get('/login',[AuthController::class,'showLogin'])->name('showLogin');
    //ログインする
    Route::post('/login',[AuthController::class,'login'])->name('login');
    
});
Route::group(['middleware' =>['auth']],function(){
    //ホーム画面の作成
    Route::get('/home',function(){
        return view('home');
    })->name('home');
    //ログアウトする
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    //マイページの情報画面
    Route::get('mypage/profile',[MypageController::class ,'showMypage'])->name('showProfile');
    //マイページの情報を変更する
    Route::post('mypage/profileEdit',[MypageController::class,'profileEdit'])->name('editProfile');

        //パスワードの変更画面
        Route::get('mypage/password',[MypageController::class ,'showPassword'])->name('showPassword');
        //パスワードを変更する
        Route::post('mypage/password',[MypageController::class,'editPassword'])->name('editPassword');
});