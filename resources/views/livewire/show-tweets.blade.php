<div>
    Show tweets

    <p>{{$message}}</p>

    <form method="post" wire:submit.prevent='create'>
        <input type="text" name="message" id="message" wire:model='message'>
        <button type="submit">Criar Tweet</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        <p>{{ $tweet->user->name }} - {{ $tweet->content }}</p>
    @endforeach
</div>
