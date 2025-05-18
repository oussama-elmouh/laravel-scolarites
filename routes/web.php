<?php

use App\Http\Controllers\NiveauxController;
use App\Http\Controllers\SchoolYearController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () { Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('niveaux')->group(function (){
    Route::get('/',[NiveauxController::class, 'index'])->name('niveaux');
});

Route::prefix('settings')->group(function (){
    Route::get('/',[SchoolYearController::class, 'index'])->name('settings');
});


});


