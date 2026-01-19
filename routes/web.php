<?php

use App\Enums\StateEnum;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ServiceController;
use App\Mail\ContactEmail;
use App\Models\Contact;
use Resend\Laravel\Facades\Resend;
use App\Http\Controllers\SettingController;


Route::get('/testemail', function () {
        $contact = Contact::create([
            'name' => "Mario",
            'email' => "mario.azcvei@hotmail.com",
            'phone' => "666666666",
            'message' => "hola",
        ]);
        
        Resend::emails()->send([
            'from' => 'Acme <onboarding@resend.dev>',
            'to' => 'mario.azcvei@hotmail.com',
            'subject' => 'Prueba contacto',
            'html' => (new ContactEmail($contact))->render(),
        ]);

        echo 'envio ok';
});
Route::get('/', [HomeController::class,'index'])->name( 'home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post("/contact-send", [HomeController::class,'storeContact'])->name('create.contact');

Route::middleware('auth')->group(function () {

    //Profile
    Route::get('/perfil', [UserController::class, 'show'])->name('user.show');
    Route::post('/usuarios-actualizar', [UserController::class, 'update'])->name(name: 'user.update');


    //Orders
    Route::get('/mis-pedidos', [OrderController::class, 'myOrders'])->name('my.orders');
    Route::get('/nuevo-pedido', [OrderController::class, 'create'])->name('create.order');
    Route::post('/pedidos-crear', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/ver-pedido/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/rating-crear', [RatingController::class, 'store'])->name('rating.store');

    //Users 
    Route::middleware('admin')->group(function () {
        Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
        Route::get('/crear-editar-usuarios/{id?}', [UserController::class, 'edit'])->name('user.create.edit');
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
        Route::get('/servicios', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/crear-editar-servicio/{id?}', [ServiceController::class, 'edit'])->name('service.create.edit');
        Route::post('/servicio-actualizar', [ServiceController::class, 'update'])->name(name: 'service.update');
        Route::post('/servicio-crear', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/servicio-eliminar/{id}', [ServiceController::class, 'destroy'])->name('service.delete');

        //Ratings
        Route::get('/resenas', [RatingController::class, 'index'])->name('ratings.index');
        Route::get('/resenas/{order}', [RatingController::class, 'ratingsOrder'])->name('ratings.order');

        //Contacts
        Route::get('/contactos', [ContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacto-eliminar/{contact}', [ContactController::class, 'destroy'])->name('contact.delete');
        
        //Settings
        Route::get('/configuracion', [SettingController::class, 'show'])->name('setting.show');
        Route::post('/configuracion', [SettingController::class, 'update'])->name('setting.update');



        

    });
});

require __DIR__.'/auth.php';
