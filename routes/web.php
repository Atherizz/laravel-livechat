<?php

use App\Models\User;
use App\Livewire\Chat;
use App\Livewire\Notif;
use App\Livewire\Friend;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    return view('dashboard', ['users' => User::where('id', '!=', Auth::id())->get()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::view('friendlist', 'friendlist')
    ->middleware(['auth'])
    ->name('friendlist');

// Route::get('/notification', function () {
//         return view('notification', ['notif' => Notification::where('to_user_id', Auth::id())->get()]);
//     })->middleware(['auth', 'verified'])->name('notification');

Route::get('/chat/{user}', Chat::class)->name('chat');
Route::get('/addfriend', Friend::class)->name('addfriend');
Route::get('/notification', Notif::class)->name('notification');
// Route::delete('/chat/{user}', [Chat::class, 'deleteMessage']);

require __DIR__.'/auth.php';
