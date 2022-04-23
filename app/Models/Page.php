<?php

namespace App\Models;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'cover_media_id'
    ];
    use HasFactory;



    public function cover()
    {
        return $this->belongsTo(Media::class, "cover_media_id");
    }

    public function images()
    {
        return $this->belongsToMany(Media::class, "image_page_media", "page_id", "media_id");
    }
}
