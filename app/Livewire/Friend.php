<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Friendlist;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class Friend extends Component
{
    public User $user;
    public $status = '';
    public function render()
    {
        $search = request('search');
        $users = [];

        if ($search) {
            $users = User::where('name', 'like', "%$search%")
            ->where('id', '!=', Auth::id())->get();
        }

        return view('livewire.addfriend', [
            'users' => $users
        ]);

    }

    public function friendRequest($id)
    {
        $user = User::findOrFail($id); 
        Friendlist::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $user->id,
            'status' => 'pending'
        ]);

        Notification::create(
            [
            'from_user_id' => Auth::id(),
            'to_user_id' => $user->id,
            'message' => Auth::user()->name . ' send you a friend request!'
            ]
        );

        // return redirect(route('addfriend'))->with('success', 'Friend Request Send!');

    }
}
