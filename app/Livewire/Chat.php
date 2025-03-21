<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{

    public $content = '';
    public $messages;

    public function allMessages()
    {
        $this->messages = Message::all();
    }

    public function mount()
    {
        $this->allMessages();
    }

    // Mesajı veritabanına kaydeden method
    public function sendMessage()
    {
        if (strlen($this->content) < 10) {
            session()->flash('error', 'Mesaj en az 10 karakter olmalıdır!');
            return;
        }
        else
        {
            Message::create([
                'user_id' => Auth::id(), // Giriş yapan kullanıcının ID'si
                'message' => $this->content,
            ]);

            $this->content = '';

            session()->flash('success', 'Mesajınız başarıyla gönderildi!');
        }

        $this->allMessages();
        
    }

    public function refresh()
    {
        $this->allMessages();
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
