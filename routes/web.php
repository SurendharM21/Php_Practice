<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'login'])->name('login');
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/login',[UserController::class,'loginPost'])->name('loginPost');
Route::post('/register',[UserController::class,'registerPost'])->name('registerPost');
Route::get('/profile',[UserController::class,'profile'])->name('profile');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::post('/edit/{id}',[UserController::class,'edit'])->name('edit');
Route::get('/userCarts',[UserController::class,'allUsers'])->name('userCart');
Route::get('/deleteUser/{id}',[UserController::class,'deleteUser'])->name('deleteUser');
