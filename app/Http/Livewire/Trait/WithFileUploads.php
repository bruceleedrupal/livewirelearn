<?php
namespace App\Http\Livewire\Trait;
use Livewire\WithFileUploads as WithFileUploadsBase ;

trait WithFileUploads {
    use WithFileUploadsBase;
    public $file;

    public function handleUploadFinished($name,$filename){       
       $this->file->store('photos');
    }
    abstract function getModelInfo();
    
    public function getListeners()
    {
        return $this->listeners + [
            'upload:finished' => 'handleUploadFinished',
        ];        
    }
}