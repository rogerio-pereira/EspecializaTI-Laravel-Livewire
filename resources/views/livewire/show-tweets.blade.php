<div>
    Show tweets

    <p>{{$content}}</p>

    <form method="post" wire:submit.prevent='create'>
        <input type="text" name="content" id="content" wire:model='content'>
        @error('content')
            {{$message}}
        @enderror
        <button type="submit">Criar Tweet</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        <p>
            {{ $tweet->user->name }} - {{ $tweet->content }} 
            
            @if ($tweet->likes->count())
                <a href=''>Descurtir</a>
            @else
                <a href=''>Curtir</a>
            @endif
        </p>
    @endforeach

    <hr>
    <div>{{ $tweets->links() }} </div>
</div>
