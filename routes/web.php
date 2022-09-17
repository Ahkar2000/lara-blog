<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/',[PageController::class,'index'])->name('page.index');
Route::get('/detail/{slug}',[PageController::class,'detail'])->name('page.detail');
Route::get("/category/{category:slug}",[PageController::class,'postByCategory'])->name('page.category');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/test',[HomeController::class, 'test'])->name('test');

Route::middleware('auth')->prefix('dashboard')->group(function(){
    Route::resource('/category',CategoryController::class);
    Route::resource('/post', PostController::class);
    Route::resource('/user',UserController::class)->middleware('isAdmin');
    Route::resource('/nation', NationController::class);
    Route::resource('/photo', PhotoController::class);
});