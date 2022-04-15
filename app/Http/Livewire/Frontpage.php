<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;


class Frontpage extends Component
{
    public $title;

    public $content;

    public function mount($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $this->title = $page->title;
        $this->content = $page->content;
    }
    public function render()
    {
        return view('livewire.frontpage')->layout('layouts.frontpage');
    }
}
