<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class TreantHorde extends Component
{
    public bool $owned = false;
    public bool $childOwned = false;

    public string $name = 'treant_horde';
    public string $parent = '';

    public array $childRecipes = [];

    protected function getListeners(): array
    {
        return ["{$this->parent}Recipe" => 'updateChild'];
    }

    public function mount()
    {
        $this->parent = $this->parent . $this->name;

        $this->setChildrenRecipes();
        $this->owned = Storage::disk('local')->get($this->name) ?? false;
    }

    public function updateChild($params)
    {
        $this->childRecipes = array_merge($this->childRecipes, $params);
        $this->updateChildOwned();
    }

    public function toggle()
    {
        $this->owned = abs($this->owned -= 1);

        // $this->emitTo('base-recipe', 'refresh');
        Storage::disk('local')->put($this->name, $this->owned);
    }

    private function setChildrenRecipes()
    {
        $this->childRecipes = [
            'toxic' => Storage::disk('local')->get("{$this->parent}_toxic") ?? false,
            'steel-infused' => Storage::disk('local')->get("{$this->parent}_steel-infused") ?? false,
            'sentinel' => Storage::disk('local')->get("{$this->parent}_sentinel") ?? false,
        ];

        $this->childOwned = !collect($this->childRecipes)->contains(false);
    }

    private function updateChildOwned()
    {
        $this->childOwned = !collect($this->childRecipes)->contains(false);
    }

    public function render()
    {
        return view('livewire.archnemesis.treant-horde');
    }
}
