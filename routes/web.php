<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;    
use App\Http\Controllers\Frontend\EventsController;
use App\Http\Controllers\Frontend\PricingController;
use App\Http\Controllers\Frontend\TrainersController;

Route::get('/', function () {
    return view('welcome');
});


//admin routes
// 1]main dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//seprate dashboard page 
Route::get('/Dashboard', function () {
    return view('layouts.adminpages.Dashboard');
})->name('Dashboard');

//admin profile
//seprate dashboard page 
Route::get('/adminprofile', function () {
    return view('layouts.adminpages.adminprofile');
})->name('adminprofile');

//frontendquries
Route::get('/frontenquiries', [ContactController::class, 'showEnquiries'])->name('layouts.adminpages.frontenquiries');


//frontend routes
//for login
route::get('/loginone', function(){
    return view('loginone');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/courses', [HomeController::class, 'courses']);
Route::get('/events', [HomeController::class, 'events']);
Route::get('/pricing', [HomeController::class, 'pricing']);
Route::get('/trainers', [HomeController::class, 'trainers']);

Route::post('contact/post', [ContactController::class, 'contact_post']);







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});
//login logout

Route::get('logout', function () {
    auth()->logout();
    
    return to_route('login');
});

Route::get('login', function () {
    auth()->login();

    return to_route('dashboard');
});


require __DIR__ . '/auth.php';





//To Add New User
Route::get('addUser', function(){
    return view('layouts.adminpages.addUserNew');
});

//To employee page
Route::get('employee', function(){
    return view('layouts.adminpages.employee');
});

//To new Login
Route::get('login2', function(){
    return view('auth.login2');
});
