<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class TreantHorde extends Component
{
    public bool $owned = false;

    public string $name = 'treant_horde';

    public string $parent = '';

    public array $childRecipes = [
        'toxic' => false,
        'steel-infused' => false,
        'sentinel' => false,
    ];

    protected function getListeners(): array
    {
        return ["{$this->parent}Recipe" => 'updateChild'];
    }

    public function mount()
    {
        $this->parent = $this->parent . $this->name;

        $this->owned = Storage::disk('local')->get($this->name) ?? false;
    }

    public function updateChild($params)
    {
        foreach($params as $key => $value)
        {
            $this->childRecipes[$key] = $value;
        }

        dd($this->childRecipes);
    }

    public function toggle()
    {
        $this->owned = abs($this->owned-=1);

        // $this->emitTo('base-recipe', 'refresh');
        Storage::disk('local')->put($this->name, $this->owned);
    }

    public function render()
    {
        return view('livewire.archnemesis.treant-horde');
    }
}
