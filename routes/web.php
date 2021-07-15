<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PagesController::class,'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('isUser');

//login refined routes
Route::post('custome', [LoginController::class,'defineRoute'])->name('october');

//AdminsController

Route::group(['prefix'=>'admin','middleware'=>['auth','isAdmin']],function(){

    Route::get('dashboard', [AdminsController::class,'index'])->name('admin.dashboard');
});
