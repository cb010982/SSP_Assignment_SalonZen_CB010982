<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->get('/customers', function (Request $request) {
    try{

        // (new \App\Models\User())->getName();

        return response()->json([
            'status' => true,
            'payload' => [],
            'timestamp' => now()->timestamp
        ]);
        
    }catch(\Exception $exception){
   
        return response()->json([
            'status' => false,
            'message' => $exception->getMessage(),
            'timestamp' => now()->timestamp
        ]);
    }
});