<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Friend extends Component
{
    public User $user;
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

    public function searchUser()
    {

    }
}
