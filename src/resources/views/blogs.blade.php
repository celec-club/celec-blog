@extends("layouts.app")
@section("title", "Home")
@section("content")
    <style type="text/css">
        .blog-zoom:hover {
            -ms-transform: scale(1.05); 
            -webkit-transform: scale(1.05);
            transform: scale(1.01); 
        }
    </style>
    <div class="container" style="margin-top: 3%;border-bottom-color: rgb(33, 37, 41);">
        <x-search-bar/>
        <div class="row" style="margin-top: 3%;">
            @foreach($blogs as $blog)
                <div class="col-sm-12 col-md-4" style="margin-top: 2%;">
                    <div class="card" style="border-width: 0px;">
                        <div class="card-body blog-zoom">
                            <a href="{{ url('b/'.$blog->slug) }}">
                                <div class="blurry-load" data-large="{{ url('storage/app/'.$blog->image->path) }}" style="background: url({{url('storage/app/'.$blog->image->path)}}) center / cover;height: 200px;border-radius: 16px;"></div>
                            </a>
                            <div style="margin-top: 3%;">
                                <h4><a href="{{ url('b/'.$blog->slug) }}" style="color: black;">{{$blog->title}}</a></h4>  <small class="text-muted">{{$blog->readingTime()}}</small>
                                <h6 class="text-muted mb-2">{{date_format($blog->created_at, "Y-m-d")}} By <a href="mailto:{{$blog->email}}">{{$blog->writer}}</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <br/>   
        </div>
        <div class="row mt-3">
            <div class="col ">
                {{$blogs->links()}}
            </div>
        </div>
        <hr style="color: rgb(125,125,125);">
        <x-categories/>
    </div>
@endsection