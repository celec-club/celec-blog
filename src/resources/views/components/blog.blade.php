<div class="col-sm-12 col-md-4" style="margin-top: 2%;">
    <div class="card" style="border-width: 0px;">
        <div class="card-body blog-zoom">
            <a href="{{ url('b/'.$blog->slug) }}">
                <div class="blurry-load"
                    data-large="{{ url("image-proxy-cdn/".generate_image_signature($blog->image->path, '400', '400', 'fit')) }}/rs:fit:400:400/g:ce/format:webp/plain/local:///storage/app/public/{{$blog->image->path}}"
                    style="background: url({{ url("image-proxy-cdn/".generate_image_signature($blog->image->path, '400', '400', 'fit')) }}/rs:fit:400:400/g:ce/format:webp/plain/local:///storage/app/public/{{$blog->image->path}}) center / cover;height: 200px;border-radius: 16px;">
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