<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderprojectController;
use App\Http\Controllers\SliderservicesController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



   Route::get('/', function () {
        return view('welcome');
    });





Auth::routes();
Route::middleware('auth')->group(function(){
    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::resource('service', ServiceController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('team', TeamController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('contact', ContactController::class)->except(['show']);
    Route::resource('settings', SettingController::class);
    Route::resource('sliderService', SliderservicesController::class);
    Route::resource('sliderproject', SliderprojectController::class);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
