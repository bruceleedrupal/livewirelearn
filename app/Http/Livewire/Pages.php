<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pages extends Component
{
    public $slug = "slug";

    public $title = "title";

    public $content = "content";

    public $modalFormVisible = true;

    public function render()
    {
        return view('livewire.pages');
    }

    /**
     * createShowModal
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }
}
