<?php

namespace App\Http\Livewire\Archnemesis;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Sentinel extends Component
{
    public bool $owned = false;

    public string $name = 'sentinel';

    public string $parent = '';

    public function mount()
    {
        $this->owned = Storage::disk('local')->get($this->name) ?? false;
        $this->emit("{$this->parent}Recipe", [$this->name => $this->owned]);
    }

    public function toggle()
    {
        $this->owned = abs($this->owned-=1);

        $this->emit("{$this->parent}Recipe", [$this->name => $this->owned]);
        Storage::disk('local')->put($this->name, $this->owned);
    }

    public function render()
    {
        return view('livewire.archnemesis.sentinel');
    }
}
