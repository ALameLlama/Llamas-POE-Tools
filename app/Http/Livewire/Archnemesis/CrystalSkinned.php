<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CrystalSkinned extends Component
{
    public bool $owned = false;
    public bool $childOwned = false;

    public string $name = 'crystal-skinned';
    public string $parent = '';
    public string $directParent = '';
    public string $buildParent = '';

    public array $childRecipes = [];

    protected function getListeners(): array
    {
        return ["{$this->name}Recipe" => 'updateChild'];
    }

    public function mount()
    {
        $this->buildParent = "{$this->parent}_{$this->name}";
        $this->owned = Storage::disk('local')->get(Auth::id() . '/' . "{$this->parent}_{$this->name}") ?? false;

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

        Storage::disk('local')->put(Auth::id() . '/' . "{$this->parent}_{$this->name}", $this->owned);
        $this->updateParent();
    }

    private function updateParent()
    {
        $this->emitUp("{$this->directParent}Recipe", [$this->name => $this->owned]);
    }

    private function setChildrenRecipes()
    {
        $this->childRecipes = [
            'rejuvenating' => Storage::disk('local')->get(Auth::id() . '/' . "{$this->parent}_{$this->name}_rejuvenating") ?? false,
            'permafrost' => Storage::disk('local')->get(Auth::id() . '/' . "{$this->parent}_{$this->name}_permafrost") ?? false,
            'berserker' => Storage::disk('local')->get(Auth::id() . '/' . "{$this->parent}_{$this->name}_berserker") ?? false,
        ];

        $this->childOwned = !collect($this->childRecipes)->contains(false);
    }

    private function updateChildOwned()
    {
        $this->childOwned = !collect($this->childRecipes)->contains(false);
    }

    public function render()
    {
        return view('livewire.archnemesis.crystal-skinned');
    }
}
