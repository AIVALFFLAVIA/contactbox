<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotesController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('contacts', ContactsController::class);

    Route::post('contacts/{contact}/notes', [NotesController::class, 'store'])->name('contacts.notes.store');
});


Route::get('/login/{service}', [SocialLoginController::class, 'redirect']);
Route::get('/login/{service}/callback', [SocialLoginController::class, 'callback']);
require __DIR__.'/auth.php';
