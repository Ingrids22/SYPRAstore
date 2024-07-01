<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Adminauth\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;

Route::get('/', function () {
    return view('welcome');
});

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
Route::view('/catalogo','/cliente/catalogo');
Route::view('/detalle','/cliente/detalle');
Route::view('/contacto','/cliente/contacto');

Route::get('/catalogo', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'catalogo'])->name('catalogo');
Route::get('/detalle/{id}', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'detalle'])->name('detalle');
Route::post('/catalogo/categoria', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'filtro_categoria'])->name('catalogo.categoria');
Route::resource('/order_details', OrderDetailController::class);
Route::resource('/orders', OrderController::class);
Route::post('/carrito/crear', [OrderController::class, 'crearPedido'])->name('carrito.crear');

Route::get('/agregar_carrito/{id}', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'agregarCarrito'])->name('carrito.agregar');
Route::post('/actualizar_carrito', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'actualizarCarrito'])->name('carrito.actualizar');
Route::delete('/quitar_carrito', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'quitarCarrito'])->name('carrito.quitar');
Route::get('/vaciar_carrito', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'vaciarCarrito'])->name('carrito.vaciar');
Route::get('/mostrar_carrito', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'mostrarCarrito'])->name('carrito.mostrar');
Route::get('/pagar_carrito', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'pagarCarrito'])->name('carrito.pagar');
Route::get('/producto', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'products'])->name('products');
Route::get('/proceso_pedido', [\App\Http\Controllers\cliente\ProductoCatalogoController::class, 'procesoPedido'])->name('carrito.procesopedido');


