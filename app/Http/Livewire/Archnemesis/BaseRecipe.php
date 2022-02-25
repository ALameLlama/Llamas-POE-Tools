<?php

namespace App\Http\Livewire\Archnemesis;

use Livewire\Component;

class BaseRecipe extends Component
{
    public array $recipes = [
        'arcane-buffer' => 0,
        'berserker' => 0,
        'bloodletter' => 0,
        'bombardier' => 0,
        'bonebreaker' => 0,
        'chaosweaver' => 0,
        'consecrator' => 0,
        'deadeye' => 0,
        'dynamo' => 0,
        'echoist' => 0,
        'flameweaver' => 0,
        'frenzied' => 0,
        'frostweaver' => 0,
        'gargantuan' => 0,
        'hasted' => 0,
        'incendiary' => 0,
        'juggernaut' => 0,
        'malediction' => 0,
        'overcharged' => 0,
        'permafrost' => 0,
        'sentinel' => 0,
        'soul-conduit' => 0,
        'steel-infused' => 0,
        'stormweaver' => 0,
        'toxic' => 0,
        'vampiric' => 0,
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

    public function getChildBaseRecipes()
    {
        $this->emit('getChildBaseRecipes');
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
