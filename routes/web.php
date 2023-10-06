<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\UserController;

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
Route::view('/services', 'services');
Route::view('/appointments','appointments');
Route::view('/products','products');
Route::view('/team','team');
Route::view('/pricing','prices');
Route::view('/cart','cart');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::resource('users', 'App\Http\Controllers\Admin\UserController');
    Route::post('/ajax-update-user/{user}', [App\Http\Controllers\Admin\UserController::class, 'ajaxUpdate']);
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin')->name('admin.dashboard');

Route::get('/admin/users', function () {

})->name('admin.users.index');




Route::resource('admin/users', 'App\Http\Controllers\Admin\UserController')->names([
    'index' => 'admin.users.index',

]);


Route::get('/customer/login', 'Auth\LoginController@showCustomerLoginForm')->name('customer.login');
Route::post('/customer/login', 'Auth\LoginController@login')->name('customer.login.submit');

Route::get('/admin/login', 'Auth\AdminLoginController@showAdminLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');


/*Route::get('/admin/users/create', function () {
    // Your code here
})->name('admin.users.create');*/

Route::post('/admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');

Route::delete('/admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');

Route::post('/admin/ajax-update-user/{id}', 'Admin\UserController@ajaxUpdate');
Route::put('/admin/ajax-insert-user', 'Admin\UserController@ajaxStore');



Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/profile', function () {
})->middleware(['auth', 'verified']);



