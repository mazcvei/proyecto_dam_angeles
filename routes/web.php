<?php

use App\Enums\StateEnum;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ServiceController;
use App\Models\illustrationType;

Route::get('/test', function () {
    dd(IllustrationType::inRandomOrder()->first()->id);
   $illustrationType = IllustrationType::inRandomOrder()->first()->id;
    return  $illustrationType;
});
Route::get('/', [HomeController::class,'index'])->name( 'home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post("/contact-send", [HomeController::class,'storeContact'])->name('create.contact');

Route::middleware('auth')->group(function () {

    //Profile
    Route::get('/perfil', [UserController::class, 'show'])->name('user.show');

    //Orders
    Route::get('/mis-pedidos', [OrderController::class, 'myOrders'])->name('my.orders');
    Route::get('/nuevo-pedido', [OrderController::class, 'create'])->name('create.order');
    Route::post('/pedidos-crear', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/ver-pedido/{order}', [OrderController::class, 'show'])->name('orders.show');


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

        // Orders
        Route::get('/pedidos', [OrderController::class, 'index'])->name('orders.index');
        Route::post('/pedidos-actualizar', [OrderController::class, 'update'])->name('orders.update');
        Route::get('/pedidos-eliminar/{order}', [OrderController::class, 'destroy'])->name('orders.delete');
        Route::post('/pedido-actualiza-estado/{order}', [OrderController::class, 'updateState'])->name('order.update.state');
        Route::get('/descargar-imagenes/{order}', [OrderController::class, 'downloadImages'])->name('orders.download.images');

        //Services 
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/crear-editar-service/{id?}', [ServiceController::class, 'edit'])->name('service.create.edit');
        Route::post('/service-actualizar', [ServiceController::class, 'update'])->name(name: 'service.update');
        Route::post('/service-crear', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/service-eliminar/{id}', [ServiceController::class, 'destroy'])->name('service.delete');

        //Ratings
        Route::get('/ratings', [RatingController::class, 'index'])->name('ratings.index');
        Route::get('/ratings/{order}', [RatingController::class, 'ratingsOrder'])->name('ratings.order');
        Route::post('/rating-crear', [RatingController::class, 'store'])->name('rating.store');


    });
});

require __DIR__.'/auth.php';
