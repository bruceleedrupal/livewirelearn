<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Test extends Component
{
    public $image;
    use WithFileUploads;

    public function render()
    {
        return view('livewire.test');
    }

    public function updatedImage(){
        dd($this->image);
    }
}
