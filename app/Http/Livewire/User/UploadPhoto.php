<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.user.upload-photo');
    }

    public function storePhoto()
    {
        $this->validate([
            'photo' => 'required|image|max:1024' //Tamanho maximo 1MB
        ]);

        // $this->photo->store('users'); //Usa o mesmo nome do arquivo
        $user = Auth::user();
        $nameFile = Str::slug($user->name) . '.' . $this->photo->getClientOriginalExtension();
        $path = $this->photo->storeAs('users', $nameFile); //Renomeia o arquivo, se houver arquivo com o mesmo nome o arquivo antigo é substituido

        if($path) {
            $user->update([
                'profile_photo_path' => $path
            ]);
        }

        return redirect()->route('tweets.index');
    }
}
