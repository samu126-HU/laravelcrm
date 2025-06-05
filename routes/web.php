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
    Route::get('/permissions', function () {
        return view('pages.permissions');
    })->name('permissions');
    Route::get('/mytasks', function () {
        return view('pages.mytasks');
    })->name('mytasks');
    Route::get('/myprojects', function () {
        return view('pages.myprojects');
    })->name('myprojects');
    Route::get('/groups', function () {
        return view('pages.groups');
    })->name('groups');
    Route::get('/employees', function () {
        return view('pages.employees');
    })->name('employees');
    Route::get('/customergroups', function () {
        return view('pages.customergroups');
    })->name('customergroups');
    Route::get('/customercontacts', function () {
        return view('pages.customercontacts');
    })->name('customercontacts');
    Route::get('/currencies', function () {
        return view('pages.currencies');
    })->name('currencies');
    Route::get('/contacts', function () {
        return view('pages.contacts');
    })->name('contacts');
    Route::get('/campaigns', function () {
        return view('pages.campaigns');
    })->name('campaigns');
});

require __DIR__.'/auth.php';
