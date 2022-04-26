<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SayHi extends Component
{
    protected $listeners = [
        "foo" => '$refresh'
    ];

    public function render()
    {
        return view('livewire.say-hi');
    }

    public function refreshChildren()
    {
        $this->emit("refreshChildren", 'ffffff');
    }
}
