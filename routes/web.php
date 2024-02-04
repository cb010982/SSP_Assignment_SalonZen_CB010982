<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\BeautyManager\BeautyManagerAppointmentController;
use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Admin\AdminStylistsController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\AnalyticsController;
use app\Models\User;

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


Route::get('/chat', [OpenAIController::class, 'index']);
Route::post('/chat', [OpenAIController::class, 'getResponse']);

Route::get('/cart/{id}',[ProductController::class,'show']);

Route::middleware('auth')->group(function () {
    Route::get('/carthistory', [CartController::class, 'showCart'])->name('carthistory.show');
    Route::get('/appointmenthistory', [AppointmentController::class, 'showAppointmentHistory'])->name('appointmenthistory.showAppointmentHistory');
    Route::get('/profileinfo', [UserProfileController::class, 'show'])->name('profileinfo.show');
    Route::get('/cart',  [CartController::class, 'showproduct']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::resource('users', 'App\Http\Controllers\Admin\UserController');
    Route::post('/ajax-update-user/{user}', [App\Http\Controllers\Admin\UserController::class, 'ajaxUpdate']);
    Route::post('/ajax-update-product/{product}', [App\Http\Controllers\Admin\AdminProductController::class, 'ajaxUpdate']);
    Route::post('/ajax-update-service/{service}', [App\Http\Controllers\Admin\AdminServiceController::class, 'ajaxUpdate']);
    Route::post('/ajax-update-appointment/{appointment}', [App\Http\Controllers\Admin\AdminAppointmentController::class, 'ajaxUpdate']);
   
});

Route::get('/cart/{id}/accept', [BeautyManagerAppointmentController::class,'acceptCartItem'])->name('carts.acceptCartItem');

Route::post('/appointments/{id}/accept', [BeautyManagerAppointmentController::class, 'accept'])->name('appointments.accept');
Route::post('/appointments/{id}/decline', [BeautyManagerAppointmentController::class, 'decline'])->name('appointments.decline');

Route::post('/carts', [CartController::class, 'store'])->name('carts.store');

Route::get('/appointments', [AppointmentController::class, 'showForm'])->name('appointments.create');

Route::post('/update-click-count', [AnalyticsController::class, 'updateClickCount']);

Route::get('/admin/dashboard', [AnalyticsController::class, 'showDashboard']);




Route::get('/admin/token', function () {
    return view('admin.token');
})->middleware('admin')->name('admin.token');

Route::put('/users/{user}', [UserProfileController::class, 'update'])->name('user.update');

//sanctum route
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/admin/user-management', [App\Http\Controllers\Admin\UserController::class, 'showUserForm'])->name('admin.user.management');
    Route::post('/admin/generate-api-token/{userId}', [App\Http\Controllers\Admin\UserController::class, 'generateApiToken'])->name('admin.generate.api.token');
});



Route::get('/admin/users', function () {

})->name('admin.users.index');
Route::get('/admin/appointments', function () {

})->name('admin.appointments.index');



Route::get('/carts', [CartController::class, 'showForm'])->name('carts.create');


Route::get('/beautymanager.cart.index', [BeautyManagerAppointmentController::class, 'showCartDetails'])->name('beautymanager.cart.index.showCartDetails');

Route::get('/admin/services', function () {

})->name('admin.services.index');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/services', [ServicesController::class, 'index']);
Route::get('/appointments', [AppointmentController::class, 'index']);
Route::get('/carts', [CartController::class, 'index']);
Route::get('/team', [AdminStylistsController::class, 'index']);



Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/products', [AdminProductController::class,'index'])->name('admin.products.index');
    Route::get('/products/create', [AdminProductController::class,'create'])->name('admin.products.create');
    Route::get('/products/edit', [AdminProductController::class,'edit'])->name('admin.products.edit');
    Route::get('/services', [AdminServiceController::class,'index'])->name('admin.services.index');
    Route::get('/services/create', [AdminServiceController::class,'create'])->name('admin.services.create');
    Route::get('/services/edit', [AdminServiceController::class,'edit'])->name('admin.services.edit');
    Route::get('/users',[UserController::class,'index'])->name('admin.users.index');
    Route::get('/appointments',[AdminAppointmentController::class,'index'])->name('admin.appointments.index');
    Route::get('/dashboard',[BeautyManagerAppointmentController::class, 'showAnalyticsDetails'])->name('admin.dashboard');
});

Route::middleware('beauty_manager')->group(function(){
Route::resource('beautymanager/appointments', 'App\Http\Controllers\BeautyManager\BeautyManagerAppointmentController')->names([
    'index' => 'beautymanager.appointments.index',
]);
Route::get('/beautymanager/cart/index', [BeautyManagerAppointmentController::class, 'showCartDetails'])
    ->name('beautymanager.cart.index');
});

//set after beauty manager beacuse of middleware intereference
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');


Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/carts', [CartController::class, 'index'])->name('carts.index');




Route::get('/beautymanager/dashboard', function () {
    return view('beautymanager.dashboard');
})->middleware('beauty_manager')->name('beautymanager.dashboard');




Route::post('/admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
Route::post('/admin/products/{product}', [App\Http\Controllers\Admin\AdminProductController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
Route::delete('/admin/products/{product}', [App\Http\Controllers\Admin\AdminProductController::class, 'destroy'])->name('admin.products.destroy');
Route::delete('/admin/services/{service}', [App\Http\Controllers\Admin\AdminServiceController::class, 'destroy'])->name('admin.services.destroy');
Route::delete('/admin/appointments/{appointment}', [App\Http\Controllers\Admin\AdminAppointmentController::class, 'destroy'])->name('admin.appointments.destroy');



Route::middleware(['web'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('/ajax-update-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'ajaxUpdate'])->name('admin.ajaxUpdateUser');
        Route::post('/ajax-update-product/{id}', [App\Http\Controllers\Admin\AdminProductController::class, 'ajaxUpdate'])->name('admin.ajaxUpdateProduct');
        Route::post('/ajax-update-service/{id}', [App\Http\Controllers\Admin\AdminServiceController::class, 'ajaxUpdate'])->name('admin.ajaxUpdateService');
        Route::post('/ajax-update-appointment/{id}', [App\Http\Controllers\Admin\AdminAppointmentController::class, 'ajaxUpdate'])->name('admin.ajaxUpdateAppointment');
        Route::put('/ajax-create-user', [App\Http\Controllers\Admin\UserController::class, 'ajaxCreate'])->name('admin.ajaxCreateUser');
        Route::put('/ajax-create-product', [App\Http\Controllers\Admin\AdminProductController::class, 'ajaxCreate'])->name('admin.ajaxCreateProduct');
        Route::put('/ajax-create-service', [App\Http\Controllers\Admin\AdminServiceController::class, 'ajaxCreate'])->name('admin.ajaxCreateService');
        Route::put('/ajax-create-appointment', [App\Http\Controllers\Admin\AdminAppointmentController::class, 'ajaxCreate'])->name('admin.ajaxCreateAppointment');
    });
});

//email
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





//test route
Route::get('/test', function(){
    return response()->json([
        'test' => 'test'
    ]);
});


