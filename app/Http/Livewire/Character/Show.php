<?php

namespace App\Http\Livewire\Character;

use App\Models\Character;
use Livewire\Component;

class Show extends Component
{
    public Character $character;

    public function mount(Character $character)
    {
        $this->character = $character;
    }

    public function render()
    {
        return view('livewire.character.show')
            ->layout('layouts.app', ['title' => $this->character->name]);
    }
}
