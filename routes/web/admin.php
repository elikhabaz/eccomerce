<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard' , [AdminController::class , 'index']);

//category
Route::get('all-categorise',[CategoryController::class , 'allcategories'])->name('all-categories');
Route::get('create-category', [CategoryController::class , 'createcategory'])->name('create-category');
Route::post('store-category', [CategoryController::class , 'storecategory'])->name('store-category');
Route::get('edit-category/{id}', [CategoryController::class , 'editcategory'])->name('edit-category');
Route::put('update-category/{id}', [CategoryController::class , 'updatecategory'])->name('update-category');
Route::delete('delete-category/{id}', [CategoryController::class , 'distroy'])->name('delete-category');

//user management
Route::get('all-users' , [UserController::class , 'allusers'])->name('all-users');
Route::get('create-user' ,[UserController::class , 'createuser'])->name('create-user');
Route::post('store-user', [UserController::class , 'storeuser'])->name('store-user');
Route::get('edit-user/{id}', [UserController::class , 'edituser'])->name('edit-user');
Route::put('update-use/{id}', [UserController::class , 'updateuser'])->name('update-user');
// Route::delete('delete-user/{id}', [UserController::class , 'distroy'])->name('delete-user');
Route::delete('/delete-user/{id}', [UserController::class , 'deleteuser'])->name('delete-user');




