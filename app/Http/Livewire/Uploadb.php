<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Trait\WithFileUploads;


class Uploadb extends Component
{
    use WithFileUploads;
    public function render()
    {
        return view('livewire.uploadb');
    }

    public function getModelInfo(){
        return [
         'model'=>'a',
         'collection'=>'b'
        ];
     }
}
