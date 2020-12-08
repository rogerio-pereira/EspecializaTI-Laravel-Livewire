<div>
    <h1>Upload foto perfil</h1>

    <form action="" method="post" wire:submit.prevent='storePhoto'>
        <input type="file" wire:model='photo'>
        @error('photo')
            {{$message}}
        @enderror
        <br/>
        <button type="submit">Upload Foto</button>
    </form>
</div>
