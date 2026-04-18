<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\FirebaseAuthController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserServiceController;

// Public routes
Route::get('/test-connection', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Backend connected successfully!',
        'timestamp' => now()->toISOString(),
    ]);
});

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{id}', [ServiceController::class, 'show']);
Route::get('/categories', [ServiceController::class, 'categories']);

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/verify-otp', \App\Http\Controllers\Auth\VerifyOtpController::class);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
Route::post('/auth/firebase/login', [FirebaseAuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/user/services', [UserServiceController::class, 'index']);
});
