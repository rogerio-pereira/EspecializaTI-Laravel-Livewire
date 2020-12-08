<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $message = 'Apenas um teste';

    public function render()
    {
        $tweets = Tweet::with('user')->get();

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create()
    {
        Tweet::create([
            'user_id' => 1,
            'content' => $this->message,
        ]);

        $this->message = '';
    }
}
