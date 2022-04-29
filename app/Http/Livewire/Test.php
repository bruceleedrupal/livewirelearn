<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{

    public $count = '1/4/2022';
    public $count2 = '1/4/2022';

    public function render()
    {
        return view('livewire.test');
    }
}
