<div class="col-sm-12 col-md-4" style="margin-top: 2%;">
    <div class="card" style="border-width: 0px;">
        <div class="card-body blog-zoom">
            <a href="{{ url('b/'.$blog->slug) }}">
                <div class="blurry-load"
                    data-large="{{ ($blog->image->count() === 1) ? url('storage/app/public/'.$blog->image->first()->path) : url('storage/app/public/'.$blog->image->firstWhere('size', 'small')->path) }}"
                    style="background: url({{ ($blog->image->count() === 1) ? url('storage/app/public/'.$blog->image->first()->path) : url('storage/app/public/'.$blog->image->firstWhere('size', 'small')->path) }}) center / cover;height: 200px;border-radius: 16px;">
                </div>
            </a>
            <div style="margin-top: 3%;">
                <h4><a href="{{ url('b/'.$blog->slug) }}" style="color: black;">{{$blog->title}}</a></h4> <small
                    class="text-muted">{{$blog->readingTime()}}</small>
                <h6 class="text-muted mb-2">{{date_format($blog->created_at, "Y-m-d")}} By <a
                        href="{{ url('user/'.$blog->user->name.'/'.$blog->user->id) }}">{{$blog->writer}}</a></h6>
            </div>
        </div>
    </div>
</div>