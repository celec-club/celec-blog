<?php

namespace App\Console\Commands;

use App\Actions\Image\CreateMultipleResizedImagesForBlogAction;
use App\Models\Blog;
use Illuminate\Console\Command;

class GenerateResizedImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:resize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resize and generate images for all blogs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('memory_limit', -1);
        $blogs = Blog::all();
        $createMultipleResizedImagesForBlogAction = new CreateMultipleResizedImagesForBlogAction;
        foreach ($blogs as $blog) {
            if ($blog->image->count() === 1) {
                $blog->image->first()->update(['size' => 'full']);
                $createMultipleResizedImagesForBlogAction->handle($blog, $blog->image->first()->path, $blog->slug);
            }
        }
    }
}
