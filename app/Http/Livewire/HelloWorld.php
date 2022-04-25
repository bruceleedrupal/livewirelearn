<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name;

    public $loud = false;

    public $greeting = ["Goodby", "Adios"];

    protected $listeners = [
        "foo" => '$refresh'
    ];

    public function refreshMe($newname = "ddddd")
    {
        $this->name = $newname . "refreshed" . $this->name;
    }
    public function mount($name = "newname")
    {
        $this->name = $name;
    }
    public function resetName($name = "testname")
    {
        $this->name = $name;
    }

    public function render()
    {
        return view('livewire.hello-world');
    }
    public function emitFoo()
    {
        return $this->emitUp("foo");
    }
}
