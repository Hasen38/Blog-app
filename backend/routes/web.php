<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\admin\UserController as adminUsercontroller;
use App\Http\Controllers\usercontroller;


Route::get('/', [PostController::class,'index'])->name('home');
Route::get('/create', [PostController::class,'create'])->name('posts.create');
Route::post('/create', [PostController::class,'store'])->name('posts.store');
Route::get('/dashboard',[dashboardcontroller::class,'index'])->name('dashboard');
// Route::get('/{user}/posts',[dashboardcontroller::class,'userspost'])->name('users.post');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
Route::view('/register', 'Auth.register')->name('register');
Route::post('/register',[Authcontroller::class,'register']);
Route::post('/logout',[Authcontroller::class,'logout'])->name('logout');

Route::view('/login', 'Auth.login')->name('login');
Route::post('/login',[Authcontroller::class,'login']);

Route::get('/admin',[adminController::class,'index'])->name('admin.index');
Route::get('/admin/users',[adminUsercontroller::class,''])->name('admin.users');

Route::resource('users',userController::class)->only('show', 'edit','update');
