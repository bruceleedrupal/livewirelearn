<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Validation\Rule;


class Pages extends Component
{
    public $slug;

    public $title;

    public $content;

    public $modalFormVisible = false;

    public function render()
    {
        return view('livewire.pages');
    }

    public function create()
    {
        $this->validate();
        Page::create($this->modelData());
        $this->clearVars();
        $this->modalFormVisible = false;
    }

    public function updatedTitle()
    {
        $this->slug = strtolower($this->title);
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')],
            'content' => 'required',
        ];
    }
    /**
     * the data for the model mapped
     *
     * @return void
     */
    public function modelData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content
        ];
    }


    public function clearVars()
    {
        $this->title = null;
        $this->slug = null;
        $this->content = null;
        $this->emit('reset-content');
        $this->resetErrorBag();
        $this->resetValidation();
    }
    /**
     * createShowModal
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->clearVars();
        $this->modalFormVisible = true;
    }
}
