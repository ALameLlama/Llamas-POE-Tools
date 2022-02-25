<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Invulnerable extends Component
{
    public bool $owned = false;
    public bool $childOwned = false;

    public string $name = 'invulnerable';
    public string $parent = '';

    public array $childRecipes = [];

    protected function getListeners(): array
    {
        return ["{$this->parent}Recipe" => 'updateChild'];
    }

    public function mount()
    {
        $this->parent = $this->parent . $this->name;
        $this->owned = Storage::disk('local')->get($this->name) ?? false;

        $this->updateParent();
        $this->setChildrenRecipes();
    }

    public function updateChild($params)
    {
        $this->childRecipes = array_merge($this->childRecipes, $params);
        $this->updateChildOwned();
    }

    public function toggle()
    {
        $this->owned = abs($this->owned -= 1);

        Storage::disk('local')->put($this->name, $this->owned);
        $this->updateParent();
    }

    private function updateParent()
    {
        $this->emitUp("{$this->parent}Recipe", [$this->name => $this->owned]);
    }

    private function setChildrenRecipes()
    {
        $this->childRecipes = [
            'sentinel' => Storage::disk('local')->get("{$this->parent}_sentinel") ?? false,
            'juggernaut' => Storage::disk('local')->get("{$this->parent}_juggernaut") ?? false,
            'consecrator' => Storage::disk('local')->get("{$this->parent}_consecrator") ?? false,
        ];

        $this->childOwned = !collect($this->childRecipes)->contains(false);
    }

    private function updateChildOwned()
    {
        $this->childOwned = !collect($this->childRecipes)->contains(false);
    }

    public function render()
    {
        return view('livewire.archnemesis.invulnerable');
    }
}
