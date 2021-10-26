<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PositionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/getMap/{mapName}',[MapsController::class,'index']);

Route::get('/getAllMap', [MapsController::class,'getAllMap']);

Route::get('/getVideos/{PosID}',[VideosController::class,'getVideosByPosID']);

Route::get('/getPos/{MapName}/{BombID}',[PositionsController::class,'getPosByMapNameAndBombId']);

Route::post('/submit-nade',[PositionsController::class,'submitNade']);

Route::get('nades/{slug}',[VideosController::class,'showVideoDetailPage']);

Route::get('/getDetail/{videoID}',[VideosController::class,'getVideoDetail']);

Route::get('/getDetailBySlug/{slug}',[VideosController::class,'getVideoDetailBySlug']);

Route::get('/getCommentByVideoId/{videoID}',[VideosController::class,'getCommentDetailByVideoID']);

Route::post('/add-comment',[CommentController::class,'addComment']);

Route::get('/users/{steamID}',[UsersController::class,'index']);

Route::get('/users/{steamID}/{mapID}',[VideosController::class,'getVideosBySteamIDAndMapID']);