<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class SteelInfused extends Component
{
    public bool $owned = false;

    public string $name = 'steel-infused';

    public string $parent = '';

    public function mount()
    {
        $this->owned = Storage::disk('local')->get("{$this->parent}_{$this->name}") ?? false;
        $this->updateParent();
    }

    public function toggle()
    {
        $this->owned = abs($this->owned-=1);

        // $this->emitTo('base-recipe', 'refresh');
        $this->updateParent();
        Storage::disk('local')->put("{$this->parent}_{$this->name}", $this->owned);
    }

    private function updateParent()
    {
        $this->emitUp("{$this->parent}Recipe", [$this->name => $this->owned]);
    }

    public function render()
    {
        return view('livewire.archnemesis.steel-infused');
    }
}
