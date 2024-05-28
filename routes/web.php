<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LinkController;
use App\Http\Controllers\LinkListController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/links/save', [LinkController::class, 'save'])->name('save-link');
    
    Route::post('/list/save', [LinkListController::class, 'save'])->name('save-list');

});
