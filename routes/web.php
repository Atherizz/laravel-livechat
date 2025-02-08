<?php

use App\Models\User;
use App\Livewire\Chat;
use App\Livewire\Notif;
use App\Livewire\Friend;
use App\Models\Friendlist;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Builder;

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

Route::delete('/friendlist/{user}', [Friend::class, 'unfriend']);


Route::get('/friendlist', function () {

        $friendlist = Friendlist::where('to_user_id', Auth::id())
        ->where('status', 'active');
        $request = request('search');

        if ($request) {
            $friendlist = $friendlist->whereHas('fromUser', function (Builder $query) use ($request) {
                $query->where('name', 'like', "%$request%");
            });
        }

        return view('friendlist', [
            'friendlist' => $friendlist->get()
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
