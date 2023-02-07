<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Products
    Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'create'])->name('add-product');
    Route::post('/add-product', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::delete('/add-product/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');

    Route::resource('roles', App\Http\Controllers\RoleController::class);
});


require __DIR__.'/auth.php';
