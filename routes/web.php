<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\ContactController;  
use App\Http\Controllers\Admin\AdminHomeController;  
use App\Http\Controllers\Admin\AdminLoginController;  
use App\Http\Middleware\GuestAdminMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserProfileController;


//frontendquries
Route::get('/frontenquiries', [ContactController::class, 'showEnquiries'])->name('layouts.adminpages.frontenquiries');


//frontend routes
Route::get('/', [HomeController::class, 'index']);
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

Route::get('logout', function () {
    auth()->logout();
    
    return redirect('/');
});


//ALL NEW ROUTES FOR LOGIN AND SIGNUP OF USER AND ADMIN
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware([GuestAdminMiddleware::class])->group(function(){
        Route::get('/login', [AdminLoginController::class, 'index']);
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login');
    });

    Route::middleware(['auth', AdminMiddleware::class])->group(function(){
        Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('dashboard');
    });
});


Auth::routes();

Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware(UserMiddleware::class);




// -------- BACKEND ROUTES STARTS ------------

// Add New User Form 
Route::match(['get', 'post'],'/add-user', [UserDataController::class, 'addNewUserData'])->name('add-user');

Route::get('/Dashboard1', function () {
    return view('layouts.adminpages.Dashboard');
})->name('Dashboard');


// Registered Users DataTable
Route::get('/registered-users', [UserDataController::class, 'handleRegisteredUsersData'])->name('registered-users');

// Route for viewing vehicles
Route::get('/users-vehicle-data', [UserDataController::class, 'handleUsersVehicleData'])->name('users-vehicle-data.view')
->defaults('action', 'view');

// Route for adding a vehicle
Route::match(['get', 'post'], '/add-new-vehicle/{add}', [UserDataController::class, 'handleUsersVehicleData'])->name('add-new-vehicle.add');

// Route for checking user ID existence
Route::post('/check-user-id', [UserDataController::class, 'checkUserId'])
    ->name('check-user-id');

// Route for editing a vehicle
Route::match(['get', 'post'], '/edit-vehicles-data/{edit}/{id}', [UserDataController::class, 'handleUsersVehicleData'])
    ->name('edit-vehicles-data.edit')
    ->where('id', '[0-9]+');

// Route for deleting a vehicle
Route::get('/users-vehicle-data/{delete}/{id}', [UserDataController::class, 'handleUsersVehicleData'])
    ->name('users-vehicle-data.delete')
    ->where('id', '[0-9]+');

// Route for view profile
Route::get('view-profile/{id}', [UserProfileController::class, 'viewProfile'])->where('id', '[0-9]+');

// -------- BACKEND ROUTES END ------------
