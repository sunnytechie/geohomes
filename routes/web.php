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

Route::get('/register/customer', [App\Http\Controllers\Auth\RegisterController::class, 'customer'])->name('auth.customer');
Route::get('/register/agent', [App\Http\Controllers\Auth\RegisterController::class, 'agent'])->name('auth.agent');
Route::get('/register/coperate', [App\Http\Controllers\Auth\RegisterController::class, 'coperate'])->name('auth.agent.coperate');

//Pages
Route::get('/about-us', [App\Http\Controllers\PagesController::class, 'about'])->name('page.about');
Route::get('/geo-agents', [App\Http\Controllers\PagesController::class, 'agents'])->name('page.agents');
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('page.contact');
Route::get('/faq', [App\Http\Controllers\PagesController::class, 'faq'])->name('page.faq');
Route::get('/listings', [App\Http\Controllers\PagesController::class, 'listings'])->name('page.listings');
Route::get('/news', [App\Http\Controllers\PagesController::class, 'news'])->name('page.news');
Route::get('/buy-rent', [App\Http\Controllers\PagesController::class, 'buyRent'])->name('page.buy.rent');
//Estate
Route::get('/geohome-estates', [App\Http\Controllers\PagesController::class, 'projects'])->name('page.projects');
Route::get('/geohome-estates/asc-order', [App\Http\Controllers\PagesController::class, 'projectAsc'])->name('project.asc.order');
Route::get('/geohome-estates/desc-order', [App\Http\Controllers\PagesController::class, 'projectDesc'])->name('project.desc.order');
Route::get('/geohome-estates/random-order', [App\Http\Controllers\PagesController::class, 'projectRadom'])->name('project.desc.random');

Route::get('/services', [App\Http\Controllers\PagesController::class, 'services'])->name('page.services');
Route::get('/filtered-search', [App\Http\Controllers\PagesController::class, 'sorted'])->name('page.sorted');

//blog posts
Route::get('/blog', [App\Http\Controllers\Blog\PostController::class, 'blog'])->name('blog.index');
Route::get('/blog/{id}', [App\Http\Controllers\Blog\PostController::class, 'show'])->name('blog.show');

//post request
//Route::get('/request-properties', [App\Http\Controllers\RequestPropertyController::class, 'new'])->name('new.request');
//Route::post('/request-properties', [App\Http\Controllers\RequestPropertyController::class, 'store'])->name('store.request');

//Route::get('/gh-admin/invoice', [App\Http\Controllers\DashboardController::class, 'invoice'])->name('dashboard.invoice');

//Building Material Booking
Route::get('/booking/building/material/{id}', [App\Http\Controllers\BookingController::class, 'show'])->name('booking.building.material.show');
Route::post('/booking/building/material/{id}', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.building.material');

//dashboard
Route::get('/geohomes/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth', 'verified', 'checkIfAgentAndIsSet', 'agentHasApproval');
Route::get('/estate/{id}', [App\Http\Controllers\WelcomeController::class, 'estate'])->name('estate.show');
Route::get('/listing/property/{id}', [App\Http\Controllers\WelcomeController::class, 'property'])->name('gh.property.show');

//building materials
Route::get('/listing/building/materials', [App\Http\Controllers\PagesController::class, 'building'])->name('listing.building.index');

//UnApproved Agents
Route::get('/geohomes/approval/status', [App\Http\Controllers\DashboardController::class, 'status'])->name('dashboard.status')->middleware('auth', 'verified');

//Share button
Route::get('/share/facebook/{title}', [App\Http\Controllers\ShareController::class, 'facebook'])->name('share.facebook');
Route::get('/share/whatsapp/{title}', [App\Http\Controllers\ShareController::class, 'whatsapp'])->name('share.whatsapp');
Route::get('/share/twitter/{title}', [App\Http\Controllers\ShareController::class, 'twitter'])->name('share.twitter');

//listings Resources
Route::middleware('auth', 'isAdmin', 'verified')->group(function () {
    Route::resource('buildings', 'App\Http\Controllers\BuildingController');
    Route::resource('projects', 'App\Http\Controllers\ProjectController');
    Route::resource('destinations', 'App\Http\Controllers\DestinationController');
    Route::resource('admins', 'App\Http\Controllers\AdminController');
    Route::resource('plots', 'App\Http\Controllers\PlotController');

    //Allocate
    Route::get('/allocate', [App\Http\Controllers\TransactionController::class, 'allocate'])->name('allocate');
    Route::post('/allocate/post', [App\Http\Controllers\TransactionController::class, 'allocatePost'])->name('allocatePost');

    //customers details
    Route::get('/customers/details/{user_id}', [App\Http\Controllers\UserController::class, 'show'])->name('show.customer.details');

    //agents
    Route::get('/partners/details/{user_id}', [App\Http\Controllers\UserController::class, 'showPartner'])->name('show.partner.details');

    //bookings
    Route::get('/bookings', [App\Http\Controllers\BookingController::class, 'bookings'])->name('bookings');
    Route::put('/bookings/delete/{id}', [App\Http\Controllers\BookingController::class, 'destroy'])->name('bookings.destroy');

    //send survey email with link
    Route::post('/notify/user/survey/{id}', [App\Http\Controllers\SurveyController::class, 'survey'])->name('survey');

    //Unapproved agents
    Route::get('/review/agents/reviews', [App\Http\Controllers\DashboardController::class, 'unApproved'])->name('unapproved.agent');
    Route::post('/review/agents/approval/{id}', [App\Http\Controllers\DashboardController::class, 'approve'])->name('approve.agent');

    //blog post
    Route::get('/gh-blog/posts', [App\Http\Controllers\Blog\PostController::class, 'index'])->name('blog.posts');
    Route::get('/gh-blog/posts/create', [App\Http\Controllers\Blog\PostController::class, 'create'])->name('blog.posts.create');
    Route::post('/gh-blog/posts/create', [App\Http\Controllers\Blog\PostController::class, 'store'])->name('blog.posts.store');
    Route::get('/gh-blog/posts/edit/{id}', [App\Http\Controllers\Blog\PostController::class, 'edit'])->name('blog.posts.edit');
    Route::put('/gh-blog/posts/update/{id}', [App\Http\Controllers\Blog\PostController::class, 'update'])->name('blog.posts.update');
    Route::delete('/gh-blog/posts/delete/{id}', [App\Http\Controllers\Blog\PostController::class, 'destroy'])->name('blog.posts.destroy');

    //advert
    Route::get('/gh-blog/adverts', [App\Http\Controllers\AdvertController::class, 'index'])->name('advert.index');
    Route::get('/gh-blog/adverts/create', [App\Http\Controllers\AdvertController::class, 'create'])->name('advert.create');
    Route::post('/gh-blog/adverts/create', [App\Http\Controllers\AdvertController::class, 'store'])->name('advert.store');
    Route::get('/gh-blog/adverts/edit/{id}', [App\Http\Controllers\AdvertController::class, 'edit'])->name('advert.edit');
    Route::put('/gh-blog/adverts/update/{id}', [App\Http\Controllers\AdvertController::class, 'update'])->name('advert.update');
    Route::delete('/gh-blog/adverts/delete/{id}', [App\Http\Controllers\AdvertController::class, 'destroy'])->name('advert.destroy');

    //gh about
    Route::get('/gh-about/info', [App\Http\Controllers\Dashboard\AboutController::class, 'index'])->name('gh.about.index');
    Route::get('/gh-about/services', [App\Http\Controllers\Dashboard\AboutController::class, 'services'])->name('gh.services');
    Route::get('/gh-about/teams', [App\Http\Controllers\Dashboard\AboutController::class, 'teams'])->name('gh.teams');

    //gh about update
    Route::put('/gh-about/update/{id}', [App\Http\Controllers\Dashboard\AboutController::class, 'update'])->name('gh.about.update');

    //post services and teams
    Route::post('/gh-about/services', [App\Http\Controllers\Dashboard\AboutController::class, 'serviceStore'])->name('gh.services.store');
    Route::post('/gh-about/teams', [App\Http\Controllers\Dashboard\AboutController::class, 'teamStore'])->name('gh.teams.store');
    //update services and teams
    Route::get('/gh-about/services/edit/{id}', [App\Http\Controllers\Dashboard\AboutController::class, 'serviceEdit'])->name('gh.services.edit');
    Route::put('/gh-about/services/update/{id}', [App\Http\Controllers\Dashboard\AboutController::class, 'serviceUpdate'])->name('gh.services.update');
    Route::get('/gh-about/teams/edit/{id}', [App\Http\Controllers\Dashboard\AboutController::class, 'teamEdit'])->name('gh.teams.edit');
    Route::put('/gh-about/teams/update/{id}', [App\Http\Controllers\Dashboard\AboutController::class, 'teamUpdate'])->name('gh.teams.update');
    //delete services and teams
    Route::delete('/gh-about/services/delete/{id}', [App\Http\Controllers\Dashboard\AboutController::class, 'serviceDelete'])->name('gh.services.delete');
    Route::delete('/gh-about/teams/delete/{id}', [App\Http\Controllers\Dashboard\AboutController::class, 'teamDelete'])->name('gh.teams.delete');

    //gh gallery
    Route::get('/gh-gallery', [App\Http\Controllers\Dashboard\AboutController::class, 'gallery'])->name('gh.gallery');
    //post gallery
    Route::post('/gh-gallery', [App\Http\Controllers\Dashboard\AboutController::class, 'galleryStore'])->name('gh.gallery.store');
    //delete gallery
    Route::delete('/gh-image/delete/{id}', [App\Http\Controllers\Dashboard\AboutController::class, 'imageDelete'])->name('gh.image.delete');
});

Route::middleware('auth', 'verified', 'hasAdminButNotAgent', 'isAgent', 'agentHasApproval')->group(function () {
    Route::resource('properties', 'App\Http\Controllers\PropertyController');
});

Route::get('/geo-projects-image', [App\Http\Controllers\PagesController::class, 'projectImage'])->name('project.image.upload');

Route::resource('agents', 'App\Http\Controllers\AgentController')->middleware('auth', 'verified');
Route::resource('invoices', 'App\Http\Controllers\InvoiceController')->middleware('auth', 'verified');

Route::get('email-subscribers', [App\Http\Controllers\UserController::class, 'subscribers'])->name('subscribed.users')->middleware('auth', 'verified', 'isAuditorAccountant');
Route::get('registered-users', [App\Http\Controllers\UserController::class, 'index'])->name('registered.users')->middleware('auth', 'verified', 'isAuditorAccountant');
Route::get('registered-agents', [App\Http\Controllers\AgentController::class, 'index'])->name('registered.agents')->middleware('auth', 'verified', 'isAuditorAccountant');
Route::delete('delete/registered-agents/{id}', [App\Http\Controllers\AgentController::class, 'destroy'])->name('registered.agents.destroy')->middleware('auth', 'verified', 'isAuditorAccountant');


//account
Route::get('/my-profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show')->middleware('auth', 'verified');
Route::put('/my-profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->middleware('auth', 'verified');

//Agent account
Route::get('/agent-profile/{id}', [App\Http\Controllers\AgentController::class, 'profile'])->name('agent.profile')->middleware('auth', 'verified', 'isAgent');
Route::put('/agent-profile/{id}/update', [App\Http\Controllers\AgentController::class, 'profileUpdate'])->name('agent.profile.update')->middleware('auth', 'verified', 'isAgent');

//Join Agent
Route::get('/join-agent-profile/{id}', [App\Http\Controllers\AgentController::class, 'profileJoin'])->name('agent.profile.join')->middleware('auth', 'verified');
Route::put('/join-agent-profile/{id}/update', [App\Http\Controllers\AgentController::class, 'profileJoinUpdate'])->name('agent.profile.join.update')->middleware('auth', 'verified');

//Paystack
Route::post('/payment/subscription', [App\Http\Controllers\PaymentController::class, 'subscription'])->name('subscription')->middleware('auth', 'verified');
Route::post('/payment/inspection', [App\Http\Controllers\PaymentController::class, 'inspection'])->name('inspection')->middleware('auth', 'verified');
Route::get('/payment/agent', [App\Http\Controllers\PaymentController::class, 'agent'])->name('agent')->middleware('auth', 'verified');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('handleGatewayCallback')->middleware('auth', 'verified');

//Initiate land subscription for client
Route::get('/initiate/land/subscription/{id}', [App\Http\Controllers\ClientController::class, 'initiateLandPayment'])->name('initiateLandPayment')->middleware('auth', 'verified');
//save client details
Route::post('/initiate/land/subscription/{id}', [App\Http\Controllers\ClientController::class, 'initiateLandPaymentPost'])->name('initiateLandPaymentPost')->middleware('auth', 'verified');

//Callback route
Route::get('/payment/subscriber/callback/{project}/{plot}', [App\Http\Controllers\CallbackController::class, 'subscribe'])->name('subscribe.handleGatewayCallback')->middleware('auth', 'verified');
Route::get('/payment/subscriber/callback/agent/{project}/{plot}', [App\Http\Controllers\CallbackController::class, 'subscribeAgent'])->name('agent.subscribe.handleGatewayCallback')->middleware('auth', 'verified');

//Final Payment on land
Route::post('/final/land/payment/{id}', [App\Http\Controllers\TransactionController::class, 'finalLandPayment'])->name('finalLandPayment')->middleware('auth', 'verified');
Route::get('/payment/land/callback/{id}', [App\Http\Controllers\CallbackController::class, 'finalLandCallback'])->name('finalLandCallback')->middleware('auth', 'verified');

//pdfs
Route::get('/generate/initial-transaction/paper/{id}', [App\Http\Controllers\PdfController::class, 'generateInitialPdf'])->name('generateInitialPdf')->middleware('auth', 'verified');
Route::get('/generate/final-transaction/paper/{id}', [App\Http\Controllers\PdfController::class, 'generateFinalPdf'])->name('generateFinalPdf')->middleware('auth', 'verified');
Route::post('/download/initial-pdf/{id}', [App\Http\Controllers\PdfController::class, 'downloadInitialPdf'])->name('downloadInitialPdf')->middleware('auth', 'verified');
Route::post('/download/final-pdf/{id}', [App\Http\Controllers\PdfController::class, 'downloadFinalPdf'])->name('downloadFinalPdf')->middleware('auth', 'verified');


//Error page
Route::get('/not-found', [App\Http\Controllers\WelcomeController::class, 'error'])->name('error404');
Route::get('/agent-limit', [App\Http\Controllers\AgentController::class, 'agentupgrade'])->name('agentupgrade')->middleware('auth', 'isAgent');

//transactions
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction')->middleware('auth', 'verified');
Route::get('/completed/transactions', [App\Http\Controllers\TransactionController::class, 'completed'])->name('transaction.completed')->middleware('auth', 'verified');

//Inspections
Route::get('/schedules', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule')->middleware('auth', 'verified');
Route::get('/schedules/post', [App\Http\Controllers\ScheduleController::class, 'schedulePost'])->name('schedulePost')->middleware('auth', 'verified');
Route::put('/schedules/Update/{id}', [App\Http\Controllers\ScheduleController::class, 'scheduleUpdate'])->name('scheduleUpdate')->middleware('auth', 'verified');

//Newsletter
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
//contact form
Route::post('/contact/post', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact.form');

//Search
Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

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
