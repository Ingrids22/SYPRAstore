<?php

use App\Http\Controllers\cliente\ProductoCatalogoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Adminauth\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/google-auth/redirect', function () {
//     return Socialite::driver('google')->redirect();
// });

// Route::get('/google-auth/callback', function () {
//     $user_google = Socialite::driver('google')->stateless()->user();

//     $user = User::updateOrCreate([
//         'google_id' => $user_google->id,
//     ], [
//         'name' => $user_google->name,
//         'email' => $user_google->email,
//     ]);

//     Auth::login($user);

//     return redirect('/dashboard');
// });

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// Route::get('auth/google/callback', [CustomerAuthController::class, 'registerGoogleUser']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';

Route::view('/plantillacarrito', 'cliente/carrito/layout');
Route::middleware(['auth:customer', 'role:client'])->group(function() {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');
require __DIR__.'/adminauth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::view('/catalogo','/cliente/catalogo');
    
});

Route::prefix('customer')->group(function () {
    Route::get('login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
    Route::post('login', [CustomerAuthController::class, 'login'])->name('customer.log');
    Route::post('logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
});

Route::middleware(['auth:client'])->group(function () {
    Route::get('/client/home', function () {
        return view('client.home');
    });

    Route::get('/client/profile', [ProfileController::class, 'edit'])->name('client.profile.edit');
    Route::patch('/client/profile', [ProfileController::class, 'update'])->name('client.profile.update');
    Route::delete('/client/profile', [ProfileController::class, 'destroy'])->name('client.profile.destroy');

    
});

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.log');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile/delete', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

Route::view('/homepage','/cliente/her_home');
Route::view('/nosotros','/cliente/her_nosotros');
Route::view('/detalle','/cliente/detalle');
Route::view('/contacto','/cliente/contacto');
Route::view('/payment', 'cliente.payment')->name('cliente.payment.view');
Route::get('/catalogo', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'catalogo'])->name('catalogo');

Route::get('/detalle/{id}', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'detalle'])->name('detalle');
Route::post('/catalogo/categoria', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'filtro_categoria'])->name('catalogo.categoria');
Route::resource('/order_details', OrderDetailController::class);
Route::get('/cliente/ordenes', [OrderController::class, 'index'])->name('cliente.ordenes');
Route::resource('/orders', OrderController::class);
Route::post('/crear_pedido', [OrderController::class, 'crearPedido'])->name('carrito.crear');

Route::get('/cliente/ordenescliente', [\App\Http\Controllers\OrderController::class, 'verOrdenes'])->name('cliente.ordenescliente');

Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

Route::group(['middleware' => ['auth']], function () {
Route::group(['middleware' => ['role:customer']], function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/ordenes', [OrderController::class, 'index'])->name('cliente.ordenes1');
        // Otras rutas protegidas por el middleware de autenticación
    });

Route::get('/agregar_carrito/{id}', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'agregarCarrito'])->name('carrito.agregar');
Route::post('/actualizar_carrito', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'actualizarCarrito'])->name('carrito.actualizar');
Route::delete('/quitar_carrito', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'quitarCarrito'])->name('carrito.quitar');
Route::get('/vaciar_carrito', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'vaciarCarrito'])->name('carrito.vaciar');
Route::get('/mostrar_carrito', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'mostrarCarrito'])->name('carrito.mostrar');
Route::get('/pagar_carrito', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'pagarCarrito'])->name('carrito.pagar');
Route::get('/producto', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'products'])->name('products');
Route::get('/proceso_pedido', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'procesoPedido'])->name('carrito.procesopedido');

// Paypal
Route::get('/metodo-de-pago/{orderId}', [OrderController::class, 'showPaymentMethod'])->name('metodo_pago');
Route::post('/pay', [PaymentController::class, 'pay'])->name('payment');
Route::get('/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/error', [PaymentController::class, 'error'])->name('payment.error');
Route::get('/payment-success/{order_id}', [PaymentController::class, 'success'])->name('payment.success');

// Rutas para catálogo y búsqueda
Route::get('/catalogo', [ProductController::class, 'index'])->name('catalogo');
Route::get('/catalogo/buscar', [ProductController::class, 'index'])->name('catalogo.buscar');

Route::view('/modal', 'cliente/carrito/modal');


});
});
