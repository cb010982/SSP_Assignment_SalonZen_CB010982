<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;

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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/services', function(){
    return view('services');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/appointment-success', 'AppointmentController@success')->name('appointment-success');

Route::post('/submit-appointment', [AppointmentController::class, 'store'])->name('submit-appointment');



