<?php

use App\Models\User;
use App\Livewire\Chat;
use App\Livewire\Notif;
use App\Livewire\Friend;
use App\Models\Friendlist;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    return view('dashboard', [
        'users' => Friendlist::where('to_user_id', Auth::id())
        ->where('status', 'active')->get()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/friendlist', function () {
        return view('friendlist', [
            'friendlist' => Friendlist::where('to_user_id', Auth::id())
            ->where('status', 'active')->get()
    ]);
    })->middleware(['auth', 'verified'])->name('friendlist');


// Route::view('friendlist', 'friendlist')
//     ->middleware(['auth'])
//     ->name('friendlist');



Route::get('/chat/{user}', Chat::class)->name('chat');
Route::get('/addfriend', Friend::class)->name('addfriend');
Route::get('/notification', Notif::class)->name('notification');
// Route::delete('/chat/{user}', [Chat::class, 'deleteMessage']);

require __DIR__.'/auth.php';
