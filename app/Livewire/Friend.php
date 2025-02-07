<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Friendlist;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

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

    public function unfriend($id) 
    {
        $user = User::findOrFail($id);
        
        Friendlist::where(function($query) use ($user) {
            $query->where('from_user_id', $user->id)
                  ->where('to_user_id', Auth::id());
        })->orWhere(function($query) use ($user) {
            $query->where('from_user_id', Auth::id())
                  ->where('to_user_id', $user->id);
        })->delete();

        $this->redirect(route('friendlist'));

    }

    public function friendRequest($id)
    {

        $user = User::findOrFail($id); 

        if ($user->status == 'active') {
            return redirect()->back()->with('error', 'User already in your friend list!');
        } else {

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

        session()->flash('status', 'Friend Request send!.');
 
        $this->redirect(route('addfriend'));

    }

    }
}
