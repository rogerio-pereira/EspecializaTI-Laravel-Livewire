<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $content = '';

    protected $rules = [
        'content' => 'required|min:3|max:255',
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->get();

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create()
    {
        $this->validate();
        Tweet::create([
            'user_id' => 1,
            'content' => $this->content,
        ]);

        $this->content = '';
    }
}
