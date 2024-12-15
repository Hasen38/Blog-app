<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\Auth\verificationcontroller;
// use App\Http\Controllers\Auth\Forgotpasswordcontroller;
// use App\Http\Controllers\Forgetpasswordcontroller;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('posts',Postcontroller::class)->middleware('auth:sanctum');
Route::post('/logout',[Authcontroller::class,'logout'])->middleware('auth:sanctum');    

Route::post('/register',[Authcontroller::class,'register']);

Route::post('/login',[Authcontroller::class,'login']);


Route::post('/verify-email', [VerificationController::class, 'verifyEmail']);

Route::post('verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::apiResource('blogs',BlogsController::class)->except('show');
// Route::get('/blogs/{id}', [BlogsController::class,'show']);

// Route::post('/forgot-password', [Forgetpasswordcontroller::class, 'sendResetLink']);
// Route::post('/reset-password/{token}', [Forgetpasswordcontroller::class, 'reset']);