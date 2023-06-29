<?php

use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

});