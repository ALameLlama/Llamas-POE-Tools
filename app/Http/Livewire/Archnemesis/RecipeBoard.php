<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class RecipeBoard extends Component
{
    public array $enabledRecipes = [];
    public array $availableRecipes = [
        'innocence-touched' => 'T5',
        'lunaris-touched' => 'T4',
        'solaris-touched' => 'T4',
        'arakaali-touched' => 'T4',
        'kitava-touched' => 'T4',
        'shakari-touched' => 'T4',
        'empowering-minions' => 'T3',
        'corpse-detonater' => 'T3',
        'abberath-touched' => 'T3',
        'tukohama-touched' => 'T3',
        'soul-eater' => 'T3',
        'effigy' => 'T3',
        'crystal-skinned' => 'T3',
        'temporal-bubble' => 'T3',
        'empowered-elements' => 'T3',
        'trickster' => 'T3',
        'brine-king-touched' => 'T3',
        'necromancer' => 'T2',
        'executioner' => 'T2',
        'invulnerable' => 'T2',
        'frost-strider' => 'T2',
        'magma-barrier' => 'T2',
        'mirror-image' => 'T2',
        'mana-siphoner' => 'T2',
        'entangler' => 'T2',
        'assassin' => 'T2',
        'flame-strider' => 'T2',
        'rejuvenating' => 'T2',
        'corrupter' => 'T2',
        'drought-bringer' => 'T2',
        'treant-horde' => 'T2',
        'hexer' => 'T2',
        'evocationist' => 'T2',
        'ice-prison' => 'T2',
        'storm-strider' => 'T2',
        'heralding-minions' => 'T2',
    ];

    public function updateRecipes()
    {
        Storage::disk('local')->put(Auth::id() . '/enabledRecipes', json_encode($this->enabledRecipes ?? []));
        $this->getChildBaseRecipes();
    }

    public function mount()
    {
        $this->enabledRecipes = json_decode(Storage::disk('local')->get(Auth::id() . '/enabledRecipes') ?? json_encode([]));
    }

    public function getChildBaseRecipes()
    {
        $this->emit('resetBaseRecipe');
        $this->emit('getChildBaseRecipes');
    }

    public function render()
    {
        return view('livewire.archnemesis.recipe-board');
    }
}
