<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Front\AboutuiController;
use App\Http\Controllers\Front\BloguiController;
use App\Http\Controllers\Front\ContactuiController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProjectuiController;
use App\Http\Controllers\Front\ServiceuiController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\AboutController;
use App\Models\About;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


    Route::get('/', [HomeController::class , 'index' ])->name('home');


Auth::routes();
Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/', function () {
        $user = Auth::user();
        $partners = Partner::all();
        $services = Service::all();
        $about = About::first();
        $blogs = Blog::all();
        $projects = Project::all();
        return view('admin.index', compact('user', 'partners', 'services', 'about', 'blogs', 'projects'));
    })->name('admin');

    Route::resource('service', ServiceController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('contact', ContactController::class);

    Route::resource('settings', SettingController::class);
    Route::resource('about', AboutController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('faq', FAQController::class);
    Route::post('faq/{faq}/toggle-status', [FAQController::class, 'toggleStatus'])->name('faq.toggle-status');
    

  
});



    Route::resource('service', ServiceuiController::class, ['names' => 'servicefront']);
    Route::resource('project', ProjectuiController::class, ['names' => 'projectfront']);
    Route::resource('blog', BloguiController::class, ['names' => 'blogfront']);
    Route::resource('contact', ContactuiController::class, ['names' => 'contactfront']);
    Route::resource('about', AboutuiController::class, ['names' => 'aboutfront']);