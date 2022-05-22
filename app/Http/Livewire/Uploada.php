<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Trait\WithFileUploads;


class Uploada extends Component
{
    use WithFileUploads;
    public function render()
    {
        return view('livewire.uploada');
    }

    public function getModelInfo(){
        return [
         'model'=>'a',
         'collection'=>'b'
        ];
     }
}
