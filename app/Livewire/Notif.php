<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Friendlist;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class Notif extends Component
{

    // Route::get('/notification', function () {
    //     //         return view('notification', ['notif' => Notification::where('to_user_id', Auth::id())->get()]);
    //     //     })->middleware(['auth', 'verified'])->name('notification');

    public function render()
    {
        return view('livewire.notification', [
            'notif' => Notification::where('to_user_id', Auth::id())->get()
        ]);
    }

    public function requestConfirmation($id, $action)
    {
        $friend = Friendlist::where('from_user_id', $id)
        ->where('to_user_id', Auth::id())
        ->where('status', 'pending')
        ->first();
        
        if ($action == 'accept') {
            Friendlist::create([
                'from_user_id' => Auth::id(),
                'to_user_id' => $friend->from_user_id,
                'status' => 'active'
            ]);
            
            $friend->status = 'active';
            $friend->save();

            session()->flash('success', 'Friend request accepted!');
        } else {
            $friend->delete();
            session()->flash('decline', 'Friend request declined!');
        }

        $notif = Notification::where('from_user_id', $id)->first();
        Notification::destroy($notif->id);

        $this->redirect(route('addfriend'));
    }
}
