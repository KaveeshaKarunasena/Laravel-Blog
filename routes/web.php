<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class,'index'])->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Post
Route::get('/post/{postId}/show',[PostController::class,'show'])->name('post.show');

Route::group(['middleware'=> 'auth'], function(){
    Route::post('/post/store',[PostController::class,'store'])->name('post.store');
    Route::get('/post/all',[HomeController::class,'allPosts'])->name('post.all');
    Route::get('/post/{postId}/edit',[PostController::class,'edit'])->name('post.edit');
    Route::post('/post/{postId}/update',[PostController::class,'update'])->name('post.update');
    Route::get('/post/{postId}/delete',[PostController::class,'delete'])->name('post.delete');

});


// admin routes

Route::group(['middleware'=> ['admin'], 'prefix' =>'admin', 'as' => 'adimn.'], function(){
    Route::get('/admin/dashboard',[DashboardController::class, 'index'])->middleware('admin')->name('dashboard');

});

