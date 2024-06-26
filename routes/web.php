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
use App\Http\Controllers\TicketController;


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
// Route::resource('LocationEdit', AdminCinemaPageController::class);
Route::resource('AdminTransaction', AdminTransactionPageController::class);
Route::resource('Homepage', HomepageController::class);
Route::resource('ShowTimes', ShowTimesController::class);
Route::resource('TicketDetails', TicketDetailsController::class);
Route::resource('Ticket', TicketController::class);


// ---------------  ADMIN FUNCTIONS --------------------------------

//dashboard
Route::get('/admindashboard',[AdminDashboardController::class,'admindashboard'])->name('admindashboard');


//login & sign up route
Route::get('/login', [AdminLoginController::class,'login'])->name('login');
Route::post('login-user',[AdminLoginController::class,'loginuser'])->name('login-user');
Route::get('/signup', [AdminSignUpController::class, 'signup']);
Route::post ('/signup-user', [AdminSignUpController::class, 'signupUser'])->name('signupUser');


//location~
Route::get('/addLocation',[AdminCinemaPageController::class,'addLocation']);
Route::post('/insertLocation',[AdminCinemaPageController::class,'insertLocation']);
Route::get('/delete/{id}',[AdminCinemaPageController::class,'deleteLocation']);
Route::get('/editLocation/{id}',[AdminCinemaPageController::class,'editLocation']);
Route::post('/updateLocation/{id}',[AdminCinemaPageController::class,'updateLocation']);

//Cinema
Route::get('/addCinema',[AdminCinemaPageController::class,'addCinema']);
Route::post('/insertCinema',[AdminCinemaPageController::class,'insertCinema']);
Route::get('/deleteCinema/{id}',[AdminCinemaPageController::class,'deleteCinema']);
Route::get('/editCinema/{id}',[AdminCinemaPageController::class,'editCinema']);
Route::post('/updateCinema/{id}',[AdminCinemaPageController::class,'updateCinema']);

//Movie
Route::get('/addMovie',[AdminMoviePageController::class,'addMovie']);
Route::post('/insertMovie',[AdminMoviePageController::class,'insertMovie']);
Route::get('/editMovie/{id}',[AdminMoviePageController::class,'editMovie']);
Route::put('/updateMovie/{id}',[AdminMoviePageController::class,'updateMovie']);
Route::get('/deletemovie/{id}',[AdminMoviePageController::class,'deleteMovie'])->withTrashed();
Route::get('/movieArchive',[AdminMoviePageController::class,'movieArchive']);
Route::get('/movieRestore/{id}',[AdminMoviePageController::class,'movieRestore'])->withTrashed();
Route::get('/movieSearch',[AdminMoviePageController::class,'movieSearch']);
Route::post('/searchmovie',[AdminMoviePageController::class,'searchmovie']);


// Schedule 
Route::get('/addSchedule',[AdminShowScheduleController::class,'addSchedule']);
Route::post('/insertSchedule',[AdminShowScheduleController::class,'insertSchedule']);
Route::get('/editSchedule/{id}',[AdminShowScheduleController::class,'editSchedule']);
Route::post('/updateSchedule/{id}',[AdminShowScheduleController::class,'updateSchedule']);
Route::get('/deleteSchedule/{id}', [AdminShowScheduleController::class,'deleteSchedule'])->withTrashed();
Route::get('/scheduleArchive',[AdminShowScheduleController::class,'scheduleArchive']);
Route::get('/scheduleRestore/{id}',[AdminShowScheduleController::class,'scheduleRestore'])->withTrashed();
Route::get('/schedSearch',[AdminShowScheduleController::class,'searchsched']);
Route::post('/schedulesearch',[AdminShowScheduleController::class,'schedulesearch']);

// ----------------CLIENT FUNCTION --------------------

Route::get('/ShowTimes/{id}', [ShowTimesController::class, 'show']);
Route::get('/TicketDetails/{id}', [TicketDetailsController::class, 'show']);

Route::get('/movielist', [HomepageController::class, 'movielist']);

Route::get('/Payment/{id}', [PaymentController::class, 'show']);
Route::post('/insertData', [PaymentController::class, 'insertData']);
Route::get('/ticket/{transactionId}/{name}/{quantity}/{totalAmount}/{scheduleID}', 
[TicketController::class, 'index'])->name('Ticket');


Route::get('/payment/show/{id}', 'PaymentController@show')->name('payment.show');

Route::get('/generate-transaction-number', [TicketController::class, 'generateTransactionNumber']);


// Route::get('/Ticket', [TicketController::class, 'index'])->name('Ticket');

// Route::resource('Payment', PaymentController::class);
