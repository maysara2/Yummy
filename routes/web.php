<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())->group(function(){

    Route::prefix('dashboard')->name('admin.')->middleware('auth','cheak_user')->group(function(){
        Route::get('/',[AdminController::class,'index'])->name('index');

        Route::resource('/home',HomeController::class);
    });





Route::get('/', function () {
    return view('welcome');
});




    Route::view('not_allowed','not_allowed');



});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



