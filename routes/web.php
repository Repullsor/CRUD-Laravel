<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::group(['middleware' => ['auth']], function() {

    Route::get('/', function () {
        return redirect()->route('screen');
    });
    
    Route::get('/logout', [SessionsController::class, 'destroy'])
        ->name('login.destroy');
    
    Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('auth.admin')
        ->name('admin.index');
    
    Route::get('/screen', function () {
        return view('screen');
    })->name('screen');
    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    
    Route::put('/edit/{id}', [UserController::class, 'update'])->name('edit.update');
    
    Route::get('/show/{user}', [UserController::class, 'show'])->name('users.show');
    
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
    
    Route::get('/users/block/{id}', [UserController::class, 'block'])->name('users.block');
    
    Route::get('/users/unlock/{id}', [UserController::class, 'unlock'])->name('users.unlock');
    
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    
    Route::get('/create', function () {
        return view('create');
    })->name('create');
    
    Route::post('/create', [ProductController::class, 'store'])
        ->name('product.store');

});

Route::get('/register', [RegisterController::class, 'create'])
        ->middleware('guest')
        ->name('register.index');
    
Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.store');
    
Route::get('/login', [SessionsController::class, 'create'])
        ->middleware('guest')
        ->name('login.index');
    
    Route::post('/login', [SessionsController::class, 'store'])
        ->name('login.store');









