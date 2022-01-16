<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\ForgotPasswordController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('uploadImg', function () {
    return view('uploadImg');
});
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);
Route::resource('messages',MessageController::class);

Route::get('/destroy/{id}',[PostController::class,'destroy']);
Route::get('/destroy/{id}',[CommentController::class,'destroy']);
Route::get('/destroy/{id}',[MessageController::class,'destroy']);

Route::get('setprofile',[UserController::class,'setprofile'])->name('setprofile');
Route::get('/deleteImg/{id}',[UserController::class,'deleteImg']);
Route::post('/upload',[UserController::class,'uploadThumbnail']);




Route::get('{any}',function(){
    return view ('media.index');
    })->where('any','.*');