<?php

namespace App\Services;


use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use App\Models\Media;

class UploadImageService extends UploadFileService
{

    private $maxWidth = 1000;


    public function save(UploadedFile $uploadedFile, string $type = "image")
    {
        $media =  parent::save($uploadedFile, $type);
        $this->process($media);
        return $media;
    }

    public function process(Media $media)
    {
        $path = explode(".", $media->path);
        $ext = array_pop($path);
        if (!in_array($ext, ['jpg', 'jpeg', 'gif'])) {
            return;
        }

        $fileSystem =   $media->public ? $this->publicFileSystem : $this->privateFileSystem;
        $img = Image::make($fileSystem->path($media->path));


        if ($img->width() > $this->maxWidth) {
            $img->widen($this->maxWidth);
            $img->save();
        }
    }
}
