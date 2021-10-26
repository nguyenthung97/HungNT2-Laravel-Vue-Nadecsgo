<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PositionsController;
use  App\Http\Controllers\Auth\SteamAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/{any}', function(){
    return view('app');
})->where('any','.*');

Route::get('login', [SteamAuthController::class, 'login']);

Route::post('logout', [LoginController::class,'logout']);
