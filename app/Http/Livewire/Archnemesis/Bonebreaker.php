<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Bonebreaker extends Component
{
    public bool $owned = false;

    public string $name = 'bonebreaker';

    public string $parent = '';
    public string $directParent = '';
    public string $buildParent = '';

    protected $listeners = ['getChildBaseRecipes' => 'setBaseRecipe'];

    public function mount()
    {
        $this->buildParent = "{$this->parent}_{$this->name}";
        $this->owned = Storage::disk('local')->get("{$this->parent}") ?? false;

        $this->updateParent();
    }

    public function toggle()
    {
        $this->owned = abs($this->owned-=1);

        Storage::disk('local')->put("{$this->parent}", $this->owned);
        $this->updateParent();
        $this->updateBaseRecipe();
    }

    private function updateParent()
    {
        $this->emitUp("{$this->directParent}Recipe", [$this->name => $this->owned]);
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
        return view('livewire.archnemesis.bonebreaker');
    }
}
