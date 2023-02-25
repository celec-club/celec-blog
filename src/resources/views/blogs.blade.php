@extends("layouts.app")
@section("title", "Browse blogs")
@section("content")
    @if($category !== null)
        <div class="category-line" style="position: fixed; top: 0; z-index: 2; height: 5px; width: 100%; {!! $category->background; !!}"></div>
    @else
        <div style="position: fixed; top: 0; z-index: 2; height: 4px; width: 100%; background-color: #001569;"></div>
    @endif
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
                <x-blog :blog="$blog" />
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
        <x-writers/>
    </div>
@endsection