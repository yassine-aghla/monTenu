<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TenueController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TenueController::class, 'frontendIndex'])->name('home');
Route::get('/boutique', [ShopController::class, 'index'])->name('shop.index');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');


Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');



Route::get('/logout', [AuthController::class, 'logout'])->name('logout.submit');



Route::middleware(['auth', 'check.permission:Gérer les produits'])->group(function () {
    Route::resource('tenues', TenueController::class);
    Route::delete('/tenue-images/{image}', [TenueController::class, 'destroyImage'])->name('tenue-images.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::post('/clients/{user}/assign-role', [ClientController::class, 'assignRole'])->name('clients.assignRole');
    Route::post('/clients/{user}/ban', [ClientController::class, 'ban'])->name('clients.ban');
    Route::post('/clients/{user}/Active', [ClientController::class, 'Active'])->name('clients.Active');
    Route::delete('/clients/{user}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::resource('categories', CategorieController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('hero-sections', HeroSectionController::class);
    Route::put('hero-sections/{hero_section}/activate', [HeroSectionController::class, 'setActive'])->name('hero-sections.activate');
    Route::get('/orders', [OrderController::class, 'display'])->name('commandes.index');
    Route::get('/orders/{order}', [OrderController::class, 'showBack'])->name('commandes.show');
    Route::get('/paniers/create', [PanierController::class, 'create'])->name('paniers.create');
});



Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/{tenue}', [WishlistController::class, 'store'])->name('wishlist.store');
Route::delete('/wishlist/{tenue}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
 Route::post('/cart/add/{tenue}', [CartController::class, 'add'])->name('cart.add');
 Route::post('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
 Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
    
Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/my-orders/{order}', [OrderController::class, 'show'])->name('orders.show');


