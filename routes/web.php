<?php

use App\Models\User;
use App\Livewire\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    return view('dashboard', ['users' => User::where('id', '!=', Auth::id())->get()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/chat/{user}', Chat::class)->name('chat');
// Route::delete('/chat/{user}', [Chat::class, 'deleteMessage']);

require __DIR__.'/auth.php';
