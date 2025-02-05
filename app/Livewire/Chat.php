<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{

    public User $user;

    #[Validate('required|string|max:1000|not_regex:/<[^>]*>/')] 
    public $message = '';
    public function render()
    {
        return view('livewire.chat', [
            'messages' =>  Message::where('from_user_id', Auth::id())
            ->orWhere('from_user_id', $this->user->id)
            ->orWhere('to_user_id', Auth::id())
            ->orWhere('to_user_id', $this->user->id)->get()
        ]);
    }

    public function sendMessage() {

        $this->validate();

        Message::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $this->user->id,
            'message' => $this->message
        ]);

        $this->reset('message');
    }

    public function deleteMessage($id) {
        $message = Message::findOrFail($id); // Akan error jika ID tidak ditemukan
        $message->delete();
    }
}
