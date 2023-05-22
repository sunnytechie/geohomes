<?php

use Illuminate\Support\Facades\Auth;
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
//Landing page
Route::get('/home', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('index.welcome');

//register users
Route::post('/register/user', [App\Http\Controllers\Auth\RegisterController::class, 'userRegister'])->name('create.new.user');

//Pages
Route::get('/about-us', [App\Http\Controllers\PagesController::class, 'about'])->name('page.about');
Route::get('/geo-agents', [App\Http\Controllers\PagesController::class, 'agents'])->name('page.agents');
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('page.contact');
Route::get('/faq', [App\Http\Controllers\PagesController::class, 'faq'])->name('page.faq');
Route::get('/listings', [App\Http\Controllers\PagesController::class, 'listings'])->name('page.listings');
Route::get('/news', [App\Http\Controllers\PagesController::class, 'news'])->name('page.news');
Route::get('/buy-rent', [App\Http\Controllers\PagesController::class, 'buyRent'])->name('page.buy.rent');
Route::get('/geo-projects', [App\Http\Controllers\PagesController::class, 'projects'])->name('page.projects');
Route::get('/services', [App\Http\Controllers\PagesController::class, 'services'])->name('page.services');

//post request
//Route::get('/request-properties', [App\Http\Controllers\RequestPropertyController::class, 'new'])->name('new.request');
//Route::post('/request-properties', [App\Http\Controllers\RequestPropertyController::class, 'store'])->name('store.request');

//Route::get('/gh-admin/invoice', [App\Http\Controllers\DashboardController::class, 'invoice'])->name('dashboard.invoice');

//dashboard
Route::get('/gh-admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth', 'verified');

//listings Resources
Route::resource('properties', 'App\Http\Controllers\PropertyController')->middleware('auth', 'verified');
Route::resource('projects', 'App\Http\Controllers\ProjectController')->middleware('auth', 'verified');
Route::get('/geo-projects-image', [App\Http\Controllers\PagesController::class, 'projectImage'])->name('project.image.upload');
Route::resource('destinations', 'App\Http\Controllers\DestinationController')->middleware('auth', 'verified');
Route::resource('agents', 'App\Http\Controllers\AgentController')->middleware('auth', 'verified');
Route::resource('invoices', 'App\Http\Controllers\InvoiceController')->middleware('auth', 'verified');
Route::resource('admins', 'App\Http\Controllers\AdminController')->middleware('auth', 'verified');

//account
Route::get('/my-profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show')->middleware('auth', 'verified');
Route::put('/my-profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->middleware('auth', 'verified');

//Paystack
Route::post('/payment/subscription', [App\Http\Controllers\PaymentController::class, 'subscription'])->name('subscription')->middleware('auth', 'verified');
Route::post('/payment/inspection', [App\Http\Controllers\PaymentController::class, 'inspection'])->name('inspection')->middleware('auth', 'verified');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('handleGatewayCallback')->middleware('auth', 'verified');
//Error page
Route::get('/not-found', [App\Http\Controllers\WelcomeController::class, 'error'])->name('error404');

Auth::routes();

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth', 'isVerified'])->name('verification.notice');

Route::post('/email/verify/resend', 'App\Http\Controllers\VerificationController@resend')
    ->middleware(['auth'])
    ->name('verification.resend');

Route::get('/email/verify/{id}/{hash}', 'App\Http\Controllers\VerificationController@verify')
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
