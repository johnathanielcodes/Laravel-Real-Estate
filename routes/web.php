<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




// front page routes
Route::view('/', 'welcome')->name('home');
Route::view('/properties', 'properties')->name('page.properties');
Route::view('/buy', 'buy')->name('buy');
Route::view('/rent', 'rent')->name('rent');


// dashboard routes
Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    Route::resource('/properties', PropertyController::class);
    Route::get('/properties', [PropertyController::class, 'index'])->name('properties');
})->middleware(['auth']);

Route::get('/get-roles', function () {
    return Auth::user()->roles()->with('permissions')->get();
});

require __DIR__ . '/auth.php';
