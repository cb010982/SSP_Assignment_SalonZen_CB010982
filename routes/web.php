<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CartController;

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

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
    Route::post('/ajax-update-product/{product}', 'App\Http\Controllers\Admin\ProductController@ajaxUpdate');
    Route::delete('/ajax-delete-product/{product}', 'App\Http\Controllers\Admin\ProductController@ajaxDelete');
});

//Route::get('/admin/products', 'Admin\ProductController@index')->name('admin.products.index');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::resource('users', 'App\Http\Controllers\Admin\UserController');
    Route::post('/ajax-update-user/{user}', [App\Http\Controllers\Admin\UserController::class, 'ajaxUpdate']);
});

Route::get('/carts', [CartController::class, 'showForm'])->name('carts.create');
Route::post('/carts', [CartController::class, 'store'])->name('carts.store');

Route::get('/appointments', [AppointmentController::class, 'showForm'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin')->name('admin.dashboard');


// Route::get('/admin/products', 'Admin\ProductController@index')->name('admin.products.index');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
});


Route::post('/cart', [CartController::class, 'store']);

Route::get('/admin/users', function () {

})->name('admin.users.index');

 Route::get('/admin/products', function () {

 })->name('admin.products.index');

Route::get('/admin/services', function () {

})->name('admin.services.index');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/services', [ServicesController::class, 'index']);

Route::resource('admin/users', 'App\Http\Controllers\Admin\UserController')->names([
    'index' => 'admin.users.index',
]);



Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('products', ProductController::class);
});




 Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');

Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');

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


// Route::get('/admin/products', 'ProductController@index')->name('admin.products.index');

// Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');