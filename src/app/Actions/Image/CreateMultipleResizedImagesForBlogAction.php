<?php

namespace App\Actions\Image;

use App\Models\Blog;
use Spatie\Image\Image;

class CreateMultipleResizedImagesForBlogAction
{
    public function handle(Blog $blog, string $fullCoverPath, string $slug): void
    {
        $smallCoverPath = 'covers/'.$slug.'-324x200-cover.jpeg';
        Image::load(storage_path().'/app/public/'.$fullCoverPath)->width(324)->height(200)->save('storage/app/public/'.$smallCoverPath);
        $mediumCoverPath = 'covers/'.$slug.'-544x350-cover.jpeg';
        Image::load(storage_path().'/app/public/'.$fullCoverPath)->width(544)->height(350)->save('storage/app/public/'.$mediumCoverPath);
        $blog->image()->create(['path' => $smallCoverPath, 'size' => 'small']);
        $blog->image()->create(['path' => $mediumCoverPath, 'size' => 'medium']);
    }
}
