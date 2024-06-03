<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LinkController;

use App\Livewire\Dashboard;
use App\Livewire\LinkList\LinkListing;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::post('/links/save', [LinkController::class, 'save'])->name('save-link');
    
    Route::get('/link-list/{id}', LinkListing::class)->name('link-list');

});
