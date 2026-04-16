<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;



// --- Protected Routes (middleware api_auth) ---
Route::middleware('api_auth')->group(function(){

    // Product Routes
    Route::controller(ProductController::class)->group(function(){
        Route::get('products', 'index');                 // select all
        Route::post('products', 'store');                // create
        Route::get('products/show/{id}', 'show');        // select one
        Route::put('products/update/{id}', 'update');    // update
        Route::delete('products/delete/{id}', 'delete'); // delete
    });

    // Auth logout
    Route::post('logout', [AuthController::class, 'logout']);

});
    
    // --- Auth Routes (لازم تكون خارج middleware عشان يشتغل register/login بدون token) ---
Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});




