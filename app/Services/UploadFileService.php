<?php

namespace App\Services;


use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Services\UploadImageService;
use Illuminate\Support\Facades\Storage;


class UploadFileService
{
    protected $publicFileSystem;
    protected $privateFileSystem;
    protected $tempFileSystem;
    protected $public = true;



    public function __construct()
    {
        $this->publicFileSystem = Storage::disk('public');
        $this->privateFileSystem = Storage::disk('local');
        $this->tempFileSystem = Storage::disk('temp');
        $this->public = !request()->hasHeader("X-DATA-PRIVATE");
    }

    public function save(UploadedFile $uploadedFile, string $type = "file")
    {
        $fileSystem = $this->getFileSystem();
        $path = $this->getPath($uploadedFile);
        $fileName = $uploadedFile->getClientOriginalName();
        $fileSystem->put($path, $uploadedFile->get());
        $media = Media::create([
            "path" => $path,
            "public" => $this->public,
            "type" => $type,
            "filename" => $fileName,
        ]);
        return $media;
    }

    public function getPath(UploadedFile $uploadedFile)
    {
        $fileSystem = $this->getFileSystem();
        $extension = $uploadedFile->clientExtension();

        $path = null;
        do {
            $path = sprintf('%s/%s/%s/%s%s.%s',  date('Y'), date('m'), date('d'), uniqId(), rand(100, 999), $extension);
        } while ($fileSystem->exists($path));

        return $path;
    }


    public function getTempMedia($type = "file")
    {
        $fileSystem = $this->getFileSystem();

        $path = "";
        do {
            $path = sprintf('%s/%s/%s/%s%s',  date('Y'), date('m'), date('d'), uniqId(), rand(100, 999));
        } while ($fileSystem->exists($path));

        $media = Media::create([
            "path" => $path,
            "public" => $this->public,
            "type" => $type
        ]);
        return $media;
    }

    public function chunk()
    {
        $request = request();
        $id = $request->id;
        $media = Media::find($id);
        $fileSystem = $this->getFileSystem();
        $fileSystem->append($media->path, $request->getContent());

        //最后一个请求
        if ($request->header('Content-Length') + $request->header('Upload-Offset') == $request->header('Upload-Length')) { //完成上传
            $oriFilename = $request->header('Upload-Name');
            $oriFilenameArr = explode('.', $oriFilename);
            $ext = '';

            $media->filename = $oriFilename;
            $media->save();
            if (count($oriFilenameArr) >= 2) {
                $ext = strtolower(array_pop($oriFilenameArr));
                $oriPath = $media->path;
                $newPath =  $oriPath . "." . $ext;
                $media->path = $newPath;
                $media->save();
                $this->getFileSystem()->move($oriPath, $newPath);
            }
            if ($media->type == "image") {
                $uploadImageService = app(UploadImageService::class);
                $uploadImageService->process($media);
            }
        }
        return $media;
    }

    protected function getFileSystem()
    {
        return  $this->public ? $this->publicFileSystem : $this->privateFileSystem;
    }

    protected function createMedia(string $path)
    {
        $media = Media::create([
            "path" => $path,
            "public" => $this->public
        ]);
        return $media;
    }
}
