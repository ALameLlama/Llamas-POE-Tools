<?php

namespace App\Http\Livewire\Archnemesis;

use Livewire\Component;

class BaseRecipe extends Component
{
    public array $recipes = [
        'sentinel' => 0
    ];

    protected $listeners = [
        'updateBaseRecipe' => 'updateBaseRecipes',
        'setBaseRecipe' => 'setBaseRecipes',
    ];

    public function updateBaseRecipes($params)
    {
        foreach($params as $component => $status) {
            if (!$status) {
                $this->recipes[$component]++;
            } else {
                $this->recipes[$component]--;
            }
        }
    }

    public function setBaseRecipes($params)
    {
        foreach($params as $component => $status) {
            if (!$status) {
                if (!array_key_exists($component, $this->recipes)) {
                    $this->recipes[] = [$component => 1];
                } else {
                    $this->recipes[$component]++;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.archnemesis.base-recipe');
    }
}
