<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Permafrost extends Component
{
    public bool $owned = false;

    public string $name = 'permafrost';

    public string $parent = '';

    protected $listeners = ['getChildBaseRecipes' => 'setBaseRecipe'];

    public function mount()
    {
        $this->owned = Storage::disk('local')->get("{$this->parent}_{$this->name}") ?? false;

        $this->updateParent();
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

    public function setBaseRecipe()
    {
        $this->emit('setBaseRecipe', [$this->name => $this->owned]);
    }

    private function updateBaseRecipe()
    {
        $this->emit("updateBaseRecipe", [$this->name => $this->owned]);
    }

    public function render()
    {
        return view('livewire.archnemesis.permafrost');
    }
}