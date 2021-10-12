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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/blog', function () {
    return view('secondary.blog');
});
    
Route::prefix('/blog')->group(function(){
    Route::get('/smoke-align-crosshair', function(){
        return view('blogposts.smoke-align-crosshair');
    });
});

Route::get('/about', function () {
return view('secondary.about');
});

Route::get('/privacypolicy', function () {
return view('secondary.privacy');
});

Route::get('/contact', function () {
return view('secondary.contact');
});

Route::get('/createnade',function () {
    return view('createnade');
})->middleware(['web','auth']);

Route::get('/maps/{mapName}',[MapsController::class,'index']);

Route::get('/getVideos/{PosID}',[VideosController::class,'getVideosByPosID']);

Route::get('/getPos/{MapName}/{BombID}',[PositionsController::class,'getPosByMapNameAndBombId']);

Route::post('/submit-nade',[PositionsController::class,'submitNade']);

Route::get('nades/{slug}',[VideosController::class,'showVideoDetailPage']);

Route::get('/getDetail/{videoID}',[VideosController::class,'getVideoDetail']);

Route::get('/getDetailBySlug/{slug}',[VideosController::class,'getVideoDetailBySlug']);

Route::get('/getCommentByVideoId/{videoID}',[VideosController::class,'getCommentDetailByVideoID']);

Route::get('login', [SteamAuthController::class, 'login']);

Route::post('/add-comment',[CommentController::class,'addComment']);

Route::get('/users/{steamID}',[UsersController::class,'index']);

Route::get('/users/{steamID}/{mapID}',[VideosController::class,'getVideosBySteamIDAndMapID']);

Route::post('logout', [LoginController::class,'logout']);