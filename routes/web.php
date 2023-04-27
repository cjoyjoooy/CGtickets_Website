<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminSignUpController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMoviePageController;
use App\Http\Controllers\AdminShowScheduleController;
use App\Http\Controllers\AdminCinemaPageController;
use App\Http\Controllers\AdminTransactionPageController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShowTimesController;
use App\Http\Controllers\TicketDetailsController;
use App\Http\Controllers\PaymentController;


/*
|-------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('login', AdminLoginController::class);
Route::resource('signup', AdminSignUpController::class);
Route::resource('AdminDashboard', AdminDashboardController::class);
Route::resource('AdminMovie', AdminMoviePageController::class);
Route::resource('AdminShowSchedule', AdminShowScheduleController::class);
Route::resource('AdminCinema', AdminCinemaPageController::class);
Route::resource('AdminTransaction', AdminTransactionPageController::class);
Route::resource('Homepage', HomepageController::class);
Route::resource('ShowTimes', ShowTimesController::class);
Route::resource('TicketDetails', TicketDetailsController::class);
Route::resource('Payment', PaymentController::class);

//dashboard
Route::get('/admindashboard',[AdminDashboardController::class,'admindashboard'])->name('admindashboard');

//login & sign up route
Route::get('/login', [AdminLoginController::class,'login'])->name('login');
Route::post('login-user',[AdminLoginController::class,'loginuser'])->name('login-user');
Route::get('/signup', [AdminSignUpController::class, 'signup']);
Route::post ('/signup-user', [AdminSignUpController::class, 'signupUser'])->name('signupUser');


//location
Route::post('/add-location',[AdminCinemaPageController::class,'addLocation'])->name('addLocation');
Route::post('/add-location',[AdminCinemaPageController::class,'addLocation'])->name('addLocation');
Route::get('/delete/{id}',[AdminCinemaPageController::class,'deleteLocation']);
Route::post('/update-location',[AdminCinemaPageController::class,'updateLocation'])->name('updateLocation');;


//Cinema
Route::post('/add-cinema',[AdminCinemaPageController::class,'addCinema'])->name('addCinema');
Route::get('/deletecinema/{id}',[AdminCinemaPageController::class,'deleteCinema']);

//Movie
Route::post('/add-movie',[AdminMoviePageController::class,'addMovie'])->name('addMovie');
Route::get('/deletemovie/{id}',[AdminMoviePageController::class,'deleteMovie']);
