<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenueController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PanierController;




Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');


Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('password.reset');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('/tenues/create', [TenueController::class, 'create'])->name('tenues.create');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes.create');
Route::get('/paniers/create', [PanierController::class, 'create'])->name('paniers.create');