<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\EmailVerificationcontroller;
use App\Http\Controllers\Auth\ResetPasswordcontroller;
use App\Http\Controllers\Auth\ForgetPasswordcontroller;
use App\Http\Controllers\Auth\ProfileUpdateController; 
use App\Http\Controllers\Admin\RolesAndPermissioncontroller;
use App\Http\Controllers\Admin\AddAdminController;
use App\Http\Controllers\Admin\Storejournalistcontroller;

// Public routes
Route::post('/register', [RegistrationController::class, 'registration']);
Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1');
Route::post('/password/forget_password', [ForgetPasswordcontroller::class, 'forgetpassword']);
Route::post('/password/reset', [ResetPasswordcontroller::class, 'passwordreset'])->middleware('throttle:5,1');

// Protected routes
Route::middleware(['auth:sanctum'])->group(function() {

    Route::get('/profile', function (Request $request) {
        return $request->user();
    });

    Route::put('/profile', [ProfileUpdateController::class, 'update']);
    Route::get('/email-verification', [EmailVerificationcontroller::class, 'send_email_verification']);

    Route::post('/email-verification', [EmailVerificationcontroller::class, 'email_verification'])->middleware('throttle:5,1');

    Route::middleware(['auth:sanctum', 'role:super admin'])->post('/add-admin', [AddAdminController::class, 'addAdmin']);
    Route::middleware(['auth:sanctum', 'role:admin'])->post('/add-journalist', [Storejournalistcontroller::class, 'addjournalist']);

    // Admin routes
   // Admin routes
// Route::prefix('{locale}/admin')->middleware('setlocale')->group(function () {
//     Route::resource('role_permission', RolesAndPermissioncontroller::class);
// });

    
});
