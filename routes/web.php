<?php

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

Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/about',[\App\Http\Controllers\HomeController::class,'about'])->name('about');
Route::get('/contact',[\App\Http\Controllers\HomeController::class,'contact'])->name('contact');
Route::get('/services',[\App\Http\Controllers\HomeController::class,'services'])->name('services');
Route::get('/favouite/vehical',[App\Http\Controllers\UsersController::class,'FavouriteList'])->name('favourite.list');
Route::get('/profile',[\App\Http\Controllers\UsersController::class,'profile'])->name('profile');
Route::post('/profile',[App\Http\Controllers\UsersController::class,'updateProfile'])->name('update.profile');
Route::post('/feedback',[App\Http\Controllers\UsersController::class,'StoreFeedback'])->name('feedback');
Route::get('fetch',[\App\Http\Controllers\Admin\ProductController::class,'fetch'])->name('fetchData');
Route::post('send-mail',[\App\Http\Controllers\HomeController::class,'sendMail'])->name('sendMail');
Route::get('/products',[\App\Http\Controllers\ProductController::class,'index'])->name('products.list');
Route::get('/product/{slug}',[\App\Http\Controllers\ProductController::class,'show'])->name('product.show');
Route::post('/product/inquiry',[App\Http\Controllers\ProductController::class,'StoreInquiry'])->name('product.inquiry');


//Admin Section
Route::get('admin/login',[\App\Http\Controllers\Admin\AuthController::class,'getLogin'])->name('admin.login');
Route::post('admin/login',[\App\Http\Controllers\Admin\AuthController::class,'postLogin'])->name('admin.post.login');

Route::middleware('admin')->prefix('admin')->namespace('\App\Http\Controllers\Admin')->name('admin.')->group(function(){

	Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');

	// Route for profile
	Route::get('profile',[\App\Http\Controllers\Admin\AuthController::class,'getProfile'])->name('profile');
	Route::post('profile',[\App\Http\Controllers\Admin\AuthController::class,'postProfile'])->name('post.profile');

	// Route for Change Password
	Route::get('password',[\App\Http\Controllers\Admin\AuthController::class,'getPassword'])->name('password');
	Route::post('password',[\App\Http\Controllers\Admin\AuthController::class,'postPassword'])->name('post.password');

	// Route for Setting
    Route::get('settings',[\App\Http\Controllers\Admin\DashboardController::class,'settings'])->name('setting');
    Route::post('settings',[\App\Http\Controllers\Admin\DashboardController::class,'post_settings'])->name('post.setting');

    Route::resource('users',UsersController::class);

    Route::resource('products',ProductController::class);

    Route::resource('product.galleries',ProductGalleryController::class);

    Route::resource('inquiries',InquiriesController::class);
    Route::post('inquiries/status',[\App\Http\Controllers\Admin\InquiriesController::class,'updateStatus'])->name('inquiries.status');

    Route::resource('feedbacks',FeedbacksController::class);


	// Route for Logout
	Route::post('logout',[\App\Http\Controllers\Admin\AuthController::class,'getLogout'])->name('admin.logout');

});
