<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $content = '';

    protected $rules = [
        'content' => 'required|min:3|max:255',
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(10);

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create()
    {
        $this->validate();

        Auth::user()->tweets()->create([
            'content' => $this->content,
        ]);

        $this->content = '';
    }

    //Poderia ter injetado a dependencia igual ao unlike
    public function like($tweetId)
    {
        $tweet = Tweet::find($tweetId);

        $tweet->likes()->create([
            'user_id' => Auth::user()->id
        ]);
    }

    public function unlike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }
}
