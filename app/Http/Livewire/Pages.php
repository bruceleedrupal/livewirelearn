<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class Pages extends Component
{
    public $slug;

    public $title;

    public $content;

    public $modalFormVisible = false;

    public $modelId;

    public $modalDeleteVisible = false;

    use WithPagination;

    public function render()
    {
        $data =  Page::paginate(5);
        return view('livewire.pages', compact('data'));
    }

    public function create()
    {
        $this->validate();
        Page::create($this->modelData());
        $this->clearVars();
        $this->modalFormVisible = false;
    }
    public function update()
    {
        $this->validate();
        $page = Page::find($this->modelId);
        $page->update($this->modelData());
        $this->clearVars();
        $this->modalFormVisible = false;
    }

    public function delete()
    {

        Page::destroy($this->modelId);
        $this->clearVars();
        $this->modalDeleteVisible = false;
    }

    public function updatedTitle()
    {
        $this->slug = strtolower($this->title);
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')->ignore($this->modelId)],
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

    public function loadModel()
    {
        $this->clearValidation();
        $page = Page::find($this->modelId);
        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->content = $page->content;
        $this->syncEditor();
    }


    public function clearVars()
    {
        $this->title = null;
        $this->slug = null;
        $this->content = null;
        $this->modelId = null;
        $this->syncEditor();
        $this->clearValidation();
    }



    protected function syncEditor()
    {
        $this->emit('sync-content');
    }

    public function updateShowModal($id)
    {
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
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

    /**
     * createShowModal
     *
     * @return void
     */
    public function deleteShowModal($id)
    {

        $this->modelId = $id;
        $this->modalDeleteVisible = true;
    }

    public function dispatchEvent()
    {
        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Sample Event',
            'eventMessage' => 'Message',
        ]);
    }
}
