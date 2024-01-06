<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\BeautyManager\BeautyManagerAppointmentController;
use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\OpenAIController;

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
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/chat', [OpenAIController::class, 'index']);
Route::post('/chat', [OpenAIController::class, 'getResponse']);

Route::get('/cart/{id}',[ProductController::class,'show']);



Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::resource('users', 'App\Http\Controllers\Admin\UserController');
    Route::post('/ajax-update-user/{user}', [App\Http\Controllers\Admin\UserController::class, 'ajaxUpdate']);
    Route::post('/ajax-update-product/{product}', [App\Http\Controllers\Admin\AdminProductController::class, 'ajaxUpdate']);
    Route::post('/ajax-update-service/{service}', [App\Http\Controllers\Admin\AdminServiceController::class, 'ajaxUpdate']);
    Route::post('/ajax-update-appointment/{appointment}', [App\Http\Controllers\Admin\AdminAppointmentController::class, 'ajaxUpdate']);
});

Route::get('/cart/{id}/accept', [BeautyManagerAppointmentController::class,'acceptCartItem'])->name('carts.acceptCartItem');
Route::get('/cart/{id}/decline', [BeautyManagerAppointmentController::class,'declineCartItem'])->name('carts.declineCartItem');

Route::post('/appointments/{id}/accept', [BeautyManagerAppointmentController::class, 'accept'])->name('appointments.accept');
Route::post('/appointments/{id}/decline', [BeautyManagerAppointmentController::class, 'decline'])->name('appointments.decline');
Route::get('/appointmenthistory', [AppointmentController::class, 'showAppointmentHistory'])->name('appointmenthistory.showAppointmentHistory');

Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
Route::get('/profileinfo', [UserProfileController::class, 'show'])->name('profileinfo.show');
Route::get('/appointments', [AppointmentController::class, 'showForm'])->name('appointments.create');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin')->name('admin.dashboard');


Route::put('/users/{user}', [UserProfileController::class, 'update'])->name('user.update');


Route::get('/admin/users', function () {

})->name('admin.users.index');
Route::get('/admin/appointments', function () {

})->name('admin.appointments.index');

Route::get('/cart',  [CartController::class, 'showproduct']);

Route::get('/carts', [CartController::class, 'showForm'])->name('carts.create');

Route::get('/carthistory', [CartController::class, 'showCart'])->name('carthistory.show');
Route::get('/beautymanager.cart.index', [BeautyManagerAppointmentController::class, 'showCartDetails'])->name('beautymanager.cart.index.showCartDetails');

Route::get('/admin/services', function () {

})->name('admin.services.index');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/services', [ServicesController::class, 'index']);
Route::get('/appointments', [AppointmentController::class, 'index']);
Route::get('/carts', [CartController::class, 'index']);

Route::resource('admin/users', 'App\Http\Controllers\Admin\UserController')->names([
    'index' => 'admin.users.index',
]);


Route::resource('admin/appointments', 'App\Http\Controllers\Admin\AdminAppointmentController')->names([
    'index' => 'admin.appointments.index',
]);


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/products', [AdminProductController::class,'index'])->name('admin.products.index');
    Route::get('/products/create', [AdminProductController::class,'create'])->name('admin.products.create');
    Route::get('/products/edit', [AdminProductController::class,'edit'])->name('admin.products.edit');
    Route::get('/login', 'Auth\AdminLoginController@showAdminLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/services', [AdminServiceController::class,'index'])->name('admin.services.index');
    Route::get('/services/create', [AdminServiceController::class,'create'])->name('admin.services.create');
    Route::get('/services/edit', [AdminServiceController::class,'edit'])->name('admin.services.edit');
});


Route::resource('beautymanager/appointments', 'App\Http\Controllers\BeautyManager\BeautyManagerAppointmentController')->names([
    'index' => 'beautymanager.appointments.index',
]);
Route::get('/beautymanager/cart/index', [BeautyManagerAppointmentController::class, 'showCartDetails'])
    ->name('beautymanager.cart.index');

    Route::get('/admin/dashboard', [BeautyManagerAppointmentController::class, 'showAnalyticsDetails'])
    ->name('admin.dashboard');

Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/carts', [CartController::class, 'index'])->name('carts.index');

Route::get('/customer/login', 'Auth\LoginController@showCustomerLoginForm')->name('customer.login');
Route::post('/customer/login', 'Auth\LoginController@login')->name('customer.login.submit');




Route::get('/beautymanager/dashboard', function () {
    return view('beautymanager.dashboard');
})->middleware('beauty_manager')->name('beautymanager.dashboard');




Route::post('/admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
Route::post('/admin/products/{product}', [App\Http\Controllers\Admin\AdminProductController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
Route::delete('/admin/products/{product}', [App\Http\Controllers\Admin\AdminProductController::class, 'destroy'])->name('admin.products.destroy');
Route::delete('/admin/services/{service}', [App\Http\Controllers\Admin\AdminServiceController::class, 'destroy'])->name('admin.services.destroy');
Route::delete('/admin/appointments/{appointment}', [App\Http\Controllers\Admin\AdminAppointmentController::class, 'destroy'])->name('admin.appointments.destroy');
Route::post('/admin/ajax-update-user/{id}', 'Admin\UserController@ajaxUpdate');
Route::post('/admin/ajax-update-product/{id}', 'Admin\AdminProductController@ajaxUpdate');
Route::post('/admin/ajax-update-service/{id}', 'Admin\AdminServiceController@ajaxUpdate');
Route::post('/admin/ajax-update-appointment/{id}', 'Admin\AdminAppointmentController@ajaxUpdate');
Route::put('/admin/ajax-create-user', 'App\Http\Controllers\Admin\UserController@ajaxCreate');
Route::put('/admin/ajax-create-product', 'App\Http\Controllers\Admin\AdminProductController@ajaxCreate');
Route::put('/admin/ajax-create-service', 'App\Http\Controllers\Admin\AdminServiceController@ajaxCreate');
Route::put('/admin/ajax-create-appointment', 'App\Http\Controllers\Admin\AdminAppointmentController@ajaxCreate');



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





