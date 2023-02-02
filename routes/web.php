<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
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
    
    Route::put('/edit/{id}', [UserController::class, 'update'])->name('users.update');
    
    Route::get('/show/{user}', [UserController::class, 'show'])->name('users.show');
    
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
    
    Route::get('/users/block/{id}', [UserController::class, 'block'])->name('users.block');
    
    Route::get('/users/unlock/{id}', [UserController::class, 'unlock'])->name('users.unlock');
    

    // Rotas Produtos

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    
    Route::get('/create', function () {
        return view('products.create');
    })->name('create')->middleware('can:product-create');
    
    Route::post('/create', [ProductController::class, 'store'])->name('product.store');

    Route::get('/products/show/{product}', [ProductController::class, 'show'])->name('product.show');

    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    
    Route::put('/products/edit/{id}', [ProductController::class, 'update'])->name('product.update');

    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    // Rotas Roles
    // Objeto route :: metodo ('/rota para o usuário', [Controller::class, 'nome da função que está no controller'])->name('nome da rota para  back end');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');

    Route::post('/roles/create', [RoleController::class, 'store'])->name('roles.store');

    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.delete');

    Route::get('/roles/show/{id}', [RoleController::class, 'show'])->name('roles.show');

    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');

    Route::put('/roles/edit/{id}', [RoleController::class, 'update'])->name('roles.update');

    // Route::get('/roles', function () {
    //     return view('roles.roles');
    // })->name('roles');

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









