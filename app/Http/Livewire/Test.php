<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Page;

class Test extends Component
{
       public $model ;

       public function mount(){
           $this->model = new Page;
           $this->model->title = "test title";
       }

       public function render()
    {
        return view('livewire.test');
    }
    
}
