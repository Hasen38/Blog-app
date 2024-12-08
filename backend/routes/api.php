<?php
use App\Http\Controllers\Auth\verificationcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Blogscontroller;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register',[Authcontroller::class,'register']);

Route::post('/login',[Authcontroller::class,'login']);

Route::post('/logout',[Authcontroller::class,'logout'])->middleware('auth:sanctum');    

Route::post('/blogs/create',[Blogscontroller::class,'store']);
Route::post('/verify-email', [VerificationController::class, 'verifyEmail']);

Route::post('verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

