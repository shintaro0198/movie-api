<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;
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
Route::post('/register',[RegisterController::class,'register']);
Route::post('/login',[LoginController::class,'login']);
Route::post('/review',[ReviewController::class,'evaluate']);
Route::put('/review',[ReviewController::class,'put']);
Route::get('/review/{id}',[ReviewController::class,'show']);
Route::get('/review',[ReviewController::class,'showAll']);
Route::post('/comment',[CommentController::class,'comment']);
Route::put('/comment', [CommentController::class, 'put']);
Route::get('/comment/{id}', [CommentController::class, 'show']);
Route::get('/comment', [CommentController::class, 'showAll']);
