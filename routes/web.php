<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/data/{table}/{id}/{view}/update', [App\Http\Controllers\DataController::class, 'update'])->name('data.update');
    Route::get('/data/{table}/{id}/{view}/edit', [App\Http\Controllers\DataController::class, 'edit'])->name('data.edit');
    Route::delete('/data/{table}/{id}', [App\Http\Controllers\DataController::class, 'delete'])->name('data.delete');
    Route::get('/customers', function () {
        return view('pages.customers');
    })->name('customers');
});

require __DIR__.'/auth.php';
