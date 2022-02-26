<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ArcaneBuffer extends Component
{
    public bool $owned = false;

    public string $name = 'arcane-buffer';

    public string $parent = '';
    public string $directParent = '';
    public string $buildParent = '';

    protected $listeners = ['getChildBaseRecipes' => 'setBaseRecipe'];

    public function mount()
    {
        $this->buildParent = "{$this->parent}_{$this->name}";
        $this->owned = Storage::disk('local')->get(Auth::id() . '/' . "{$this->parent}_{$this->name}") ?? false;

        $this->updateParent();
    }

    public function toggle()
    {
        $this->owned = abs($this->owned-=1);

        Storage::disk('local')->put(Auth::id() . '/' . "{$this->parent}_{$this->name}", $this->owned);
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
        return view('livewire.archnemesis.arcane-buffer');
    }
}
