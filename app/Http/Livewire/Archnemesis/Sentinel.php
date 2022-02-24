<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Sentinel extends Component
{
    public bool $owned = false;

    public string $name = 'sentinel';

    public string $parent = '';

    public function mount()
    {
        $this->owned = Storage::disk('local')->get("{$this->parent}_{$this->name}") ?? false;
        $this->updateParent();
        $this->setBaseRecipe();
    }

    public function toggle()
    {
        $this->owned = abs($this->owned-=1);

        Storage::disk('local')->put("{$this->parent}_{$this->name}", $this->owned);
        $this->updateParent();
        $this->updateBaseRecipe();
    }

    private function updateParent()
    {
        $this->emitUp("{$this->parent}Recipe", [$this->name => $this->owned]);
    }

    private function setBaseRecipe()
    {
        $this->emitTo('base-recipe', 'setBaseRecipe', [$this->name => $this->owned]);
        $this->emitTo('archnemesis.base-recipe', 'setBaseRecipe', [$this->name => $this->owned]);
        $this->emitUp('setBaseRecipe', [$this->name => $this->owned]);
        $this->emit('setBaseRecipe', [$this->name => $this->owned]);
    }

    private function updateBaseRecipe()
    {
        $this->emit("updateBaseRecipe", [$this->name => $this->owned]);
    }

    public function render()
    {
        return view('livewire.archnemesis.sentinel');
    }
}
