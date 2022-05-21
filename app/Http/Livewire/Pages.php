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

    public $cover_media_id;

    public $modalFormVisible = false;

    public $modelId;

    public $images=[];

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

        $page = Page::create($this->modelData());
        $this->updateRelated($page);
        $this->clearVars();
        $this->modalFormVisible = false;
    }
    public function update()
    {


        $this->validate();
        $page = Page::find($this->modelId);
        $page->update($this->modelData());
        $this->updateRelated($page);
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
            'content' => $this->content,
            'cover_media_id' => $this->cover_media_id,
            'images' => $this->images
        ];
    }

    public function loadModel()
    {

        $this->clearValidation();
        $page = Page::find($this->modelId);

        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->content = $page->content;
        $this->cover_media_id = $page->cover_media_id;
        $this->images = $page->images->pluck('id');
        $this->syncEditor();
    }


    public function clearVars()
    {
        $this->reset();
        $this->syncEditor();
        $this->clearValidation();
    }



    protected function syncEditor()
    {
         $this->dispatchBrowserEvent("sync");
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

    private function updateRelated($page)
    {
        $images = $this->images;        
        $page->images()->sync($images);
    }
}
