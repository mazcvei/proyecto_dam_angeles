<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return view('orders.create');
});
Route::get('/', [HomeController::class,'index'])->name( 'home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Profile
    Route::get('/perfil', [UserController::class, 'show'])->name('user.show');


    //Users 
    Route::middleware('admin')->group(function () {
        Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
        Route::get('/crear-editar-usuarios/{id?}', [UserController::class, 'edit'])->name('user.create.edit');
        Route::post('/usuarios-actualizar', [UserController::class, 'update'])->name(name: 'user.update');
        Route::post('/usuarios-crear', [UserController::class, 'store'])->name('user.store');
        Route::get('/usuarios-eliminar/{id}', [UserController::class, 'destroy'])->name('user.delete');

        //Roles 
        Route::get('/roles', [RolController::class, 'index'])->name('rol.index');
        Route::get('/crear-editar-rol/{id?}', [RolController::class, 'edit'])->name('rol.create.edit');
        Route::post('/rol-actualizar', [RolController::class, 'update'])->name(name: 'rol.update');
        Route::post('/rol-crear', [RolController::class, 'store'])->name('rol.store');
        Route::get('/rol-eliminar/{id}', [RolController::class, 'destroy'])->name('rol.delete');

    });

   
});

require __DIR__.'/auth.php';
