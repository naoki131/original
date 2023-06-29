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
Route::get('/top',[TopController::class ,'topShow'])->name('top');

Route::get('/a',[AuthController::class,'showLogin'])->name('showLogin');
Route::post('/login',[AuthController::class,'login'])->name('login');