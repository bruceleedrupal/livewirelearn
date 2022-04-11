<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "path",
        "public",
        "type",
        "filename"
    ];




    public function getPath()
    {
        if ($this->public)
            return config("filesystems.publicPrefix") . $this->path;
        else
            return config("filesystems.privatePrefix") . $this->path;
    }
    public function getUrl()
    {
        if ($this->public)
            return config("filesystems.publicUrl") . $this->path;
        else
            return null;
    }
    public function getCache(string $template = "custom")
    {
        if ($this->public) {
            return route('imagecache', ["template" => $template, "filename" => $this->path]);
        } else
            return null;
    }

    protected static function boot()
    {
        parent::boot();
        Media::deleting(function ($model) {
            @unlink(storage_path($model->getPath()));
        });
    }

    public function coverPost()
    {
        return $this->hasOne(Post::class, "cover_media_id");
    }

    public function imagesPost()
    {
        return $this->belongsToMany(Post::class, "image_post_media", "media_id", "post_id");
    }
}
