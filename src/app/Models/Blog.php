<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Mtownsend\ReadTime\ReadTime;

class Blog extends Model {
    use HasFactory;
    protected $fillable = ["title", "content", "writer", "email", "views", "category_id", "slug"];
    public $timestamps = true;

    public function image() {
    	return $this->morphOne(Image::class, 'imageable');
    }

    public function tags() {
    	return $this->belongsToMany(Tag::class, "blog_tags");
    }

    public function readingTime() {
        $content = $this->content;
    	return  Cache::rememberForever('read-time-'.$this->id, function() use ($content) {
            return (new ReadTime($content))->get();
        });
    }
}
