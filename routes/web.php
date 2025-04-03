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





Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TenueController::class, 'frontendIndex'])->name('home');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

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

// Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout.submit');
// Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
// Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
// Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth', 'check.permission:Gérer les produits'])->group(function () {
    Route::resource('tenues', TenueController::class);
    Route::delete('/tenue-images/{image}', [TenueController::class, 'destroyImage'])->name('tenue-images.destroy');
});

Route::get('/tenues/create', [TenueController::class, 'create'])->name('tenues.create');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::resource('categories', CategorieController::class);
Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes.create');
Route::get('/paniers/create', [PanierController::class, 'create'])->name('paniers.create');

Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('brands', BrandController::class);
Route::resource('hero-sections', HeroSectionController::class);
Route::put('hero-sections/{hero_section}/activate', [HeroSectionController::class, 'setActive'])->name('hero-sections.activate');