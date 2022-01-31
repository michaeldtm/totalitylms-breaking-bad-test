<?php

namespace App\Http\Livewire\Character;

use App\Models\Character;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $category = 'Breaking Bad';

    public int $season = 0;

    public string $character = '';

    public function updatingCharacter()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.character.index', [
            'characters' => Character::query()
                ->where('category', 'like', '%' . $this->category . '%')
                ->when($this->season > 0, fn ($query) => $query->whereJsonContains('appearance', $this->season))
                ->when(! empty($this->character),
                    fn ($query) => $query->whereRaw('lower(name) like ?', '%' . strtolower($this->character) . '%'))
                ->paginate(10)
        ])->layout('layouts.app', ['title' => 'Characters list']);
    }
}
