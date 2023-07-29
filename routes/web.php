<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('master');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/' , [HomeController::class , 'index']);
Route::get('redirect' , [HomeController::class, 'redirect'] );

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('all-categorise',[CategoryController::class , 'allcategories'])->name('all-categories');
    Route::get('create-category', [CategoryController::class , 'createcategory'])->name('create-category');
    Route::post('store-category', [CategoryController::class , 'storecategory'])->name('store-category');
    Route::get('edit-category/{id}', [CategoryController::class , 'editcategory'])->name('edit-category');
    Route::put('update-category/{id}', [CategoryController::class , 'updatecategory'])->name('update-category');
    Route::delete('delete-category/{id}', [CategoryController::class , 'distroy'])->name('delete-category');


    Route::get('all-users' , [UserController::class , 'allusers'])->name('all-users');
    Route::get('create-user' ,[UserController::class , 'createuser'])->name('create-user');


});

require __DIR__.'/auth.php';
