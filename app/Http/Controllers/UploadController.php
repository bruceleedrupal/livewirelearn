<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Services\UploadFileService;
use App\Services\UploadImageService;
use Illuminate\Contracts\Cache\Store;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class UploadController extends Controller
{


    public function ckImage(Request $request, UploadImageService $uploadImageService)
    {
        $media = $uploadImageService->save($request->file('upload'));
        $url = $media->getUrl();

        DB::table('media')->where('id', $media->id)->delete();

        return response()->json([
            'url' => $url
        ]);
    }

    public function storeImage(Request $request, UploadImageService $uploadImageService)
    {
        if ($request->hasHeader("Upload-Length")) {
            $media = $uploadImageService->getTempMedia("image");
            return  response($media->id)->header('Content-Type', 'text/plain');
        }
        return  response($uploadImageService->save($this->getFile())->id)->header('Content-Type', 'text/plain');
    }

    public function storeFile(Request $request, UploadFileService $uploadFileService)
    {
        if ($request->hasHeader("Upload-Length")) {
            $media = $uploadFileService->getTempMedia();
            return  response($media->id)->header('Content-Type', 'text/plain');
        }
        return response($uploadFileService->save($this->getFile())->id)->header('Content-Type', 'text/plain');
    }

    public function chunk(UploadFileService $uploadFileService)
    {
        $media = $uploadFileService->chunk();
        return  response($media->id)->header('Content-Type', 'text/plain');
    }


    public function get(Request $request)
    {
        $query = $request->query();
        foreach ($query as $key => $id) {
            if ($key == "restore") {
                $media = Media::find($id);
                return response()->file(storage_path($media->getPath()), ['Content-Disposition' => 'inline; filename="' . rawurlencode($media->filename) . '"']);
            } elseif ($key == "load") {
                return "load";
            } elseif ($key == "fetch") {
                return "fetch";
            } elseif ($key == "patch") {
                return "patch";
            }
        }
        return null;
    }

    public function delete(Request $request)
    {
        $id = $request->getContent();
        $media = Media::find($id);
        $media->delete();
        return response($id)->header('Content-Type', 'text/plain');
    }

    public function test(Request $request, UploadImageService $uploadImageService)
    {
        $request->validate(
            [
                "upload" => ["required"]
            ],
            [
                "upload.required" => "必须上传图片"
            ]
        );

        $img = Image::make($request->file('upload')->get());

        return $uploadImageService->save($request->file('upload'));
    }
    public function upload()
    {
        return view('upload.upload');
    }

    protected  function getFile()
    {
        $file = request()->file();
        while (is_array($file)) {
            $file = array_pop($file);
        }
        return $file;
    }
}
