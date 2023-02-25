@extends("layouts.app")
@section("title", "Home")
@section("content")
    <div class="container" style="margin-top: 3%;border-bottom-color: rgb(33, 37, 41);">
        <x-search-bar/>
        <div class="row" style="margin-top: 3%;">
            <div class="col">
                <h1># Latest articles:</h1>
            </div>
        </div>
        @if($blogs->count() > 0)
            {{-- @inject('readtime', 'Mtownsend\ReadTime\ReadTime') --}}
            <div class="row" style="margin-top: 3%;">
                <div class="col-sm-12 col-md-6">
                    <div class="row">
                        <? $blog = $blogs->pop(); ?>
                        @if($blog !== null)
                            <div class="col" style="margin-top: 1%;">
                                <div class="card blog-index-card" style="border-radius: 10px !important;">
                                    <img data-large="{{ url("image-proxy-cdn/".generate_image_signature($blog->image->path, '600', '600', 'fit')) }}/rs:fit:600:600/g:ce/format:webp/plain/local:///storage/app/public/{{$blog->image->path}}" class="blurry-load card-img w-100 d-block img-fuild" src="{{ url("image-proxy-cdn/".generate_image_signature($blog->image->path, '600', '600', 'fit')) }}/rs:fit:600:600/g:ce/format:webp/plain/local:///storage/app/public/{{$blog->image->path}}" style="height: 350px; border-radius: 10px !important;">
                                    <div class="card-img-overlay index-blog" style="position: absolute;top: 65% !important;right: 0 !important; border-radius: 10px;">
                                     <h4 style="color: white;">
                                        <a style="color: white; font-weight:bolder;" href="{{ url('b/'.$blog->slug) }}">{{$blog->title}}</a>
                                        <br/>
                                        {{date_format($blog->created_at, "Y-m-d")}} <small style="font-size:16px;">{{ $blog->readingTime() }}</small>
                                    </h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row" style="margin-top: 1%;">
                        <? $blog = $blogs->pop(); ?>
                        @if($blog !== null)
                            <div class="col" style="margin-top: 1%;">
                                <div class="card blog-index-card" style="border-radius: 10px !important;">
                                    <img data-large="{{ url("image-proxy-cdn/".generate_image_signature($blog->image->path, '600', '600', 'fit')) }}/rs:fit:600:600/g:ce/format:webp/plain/local:///storage/app/public/{{$blog->image->path}}" class="blurry-load card-img w-100 d-block img-fuild" src="{{ url("image-proxy-cdn/".generate_image_signature($blog->image->path, '600', '600', 'fit')) }}/rs:fit:600:600/g:ce/format:webp/plain/local:///storage/app/public/{{$blog->image->path}}" style="height: 350px; border-radius: 10px !important;">
                                    <div class="card-img-overlay index-blog" style=" position: absolute;top: 65% !important;right: 0 !important; border-radius: 10px;">
                                     <h4 style="color: white;">
                                        <a style="color: white; font-weight:bolder;" href="{{ url('b/'.$blog->slug) }}">{{$blog->title}}</a>
                                        <br/>
                                        {{date_format($blog->created_at, "Y-m-d")}} <small style="font-size:16px;">{{ $blog->readingTime() }}</small>
                                    </h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="row">
                         <? $blog = $blogs->pop(); ?>
                         @if($blog !== null)
                            <div class="col" style="margin-top: 1%;">
                                <div class="card blog-index-card" style="border-radius: 10px !important;">
                                    <img data-large="{{ url("image-proxy-cdn/".generate_image_signature($blog->image->path, '600', '600', 'fit')) }}/rs:fit:600:600/g:ce/format:webp/plain/local:///storage/app/public/{{$blog->image->path}}" class="blurry-load card-img w-100 d-block img-fuild" src="{{ url("image-proxy-cdn/".generate_image_signature($blog->image->path, '600', '600', 'fit')) }}/rs:fit:600:600/g:ce/format:webp/plain/local:///storage/app/public/{{$blog->image->path}}" style="height: 350px; border-radius: 10px !important;">
                                    <div class="card-img-overlay index-blog" style="position: absolute;top: 65% !important;right: 0 !important; border-radius: 10px;">
                                        <h4 style="color: white;">
                                            <a style="color: white; font-weight:bolder;" href="{{ url('b/'.$blog->slug) }}">{{$blog->title}}</a>
                                            <br/>
                                            {{date_format($blog->created_at, "Y-m-d")}} <small style="font-size:16px;">{{ $blog->readingTime() }}</small>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row" style="margin-top: 1%;">
                        <div class="col" style="margin-top: 1%;">
                            <? $blog = $blogs->pop(); ?>
                            @if($blog !== null)
                                <div class="card blog-index-card" style="border-radius: 10px !important;">
                                    <img data-large="{{ url("image-proxy-cdn/".generate_image_signature($blog->image->path, '600', '600', 'fit')) }}/rs:fit:600:600/g:ce/format:webp/plain/local:///storage/app/public/{{$blog->image->path}}" class="blurry-load card-img w-100 d-block img-fuild" src="{{ url("image-proxy-cdn/".generate_image_signature($blog->image->path, '600', '600', 'fit')) }}/rs:fit:600:600/g:ce/format:webp/plain/local:///storage/app/public/{{$blog->image->path}}" style="height: 350px; border-radius: 10px !important;">
                                    <div class="card-img-overlay index-blog" style="position: absolute;top: 65% !important;right: 0 !important; border-radius: 10px;">
                                        <h4 style="color: white;">
                                            <a style="color: white; font-weight:bolder;" href="{{ url('b/'.$blog->slug) }}">{{$blog->title}}</a>
                                            <br/>
                                            {{date_format($blog->created_at, "Y-m-d")}} <small style="font-size:16px;">{{ $blog->readingTime() }}</small>
                                        </h4>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row" style="margin-top: 3%;">
            <div class="col text-center"><a href="{{ url('blogs') }}" style="font-size: 34px;color: rgb(0,0,0);">Browse all&nbsp;<i class="fas fa-arrow-circle-right"></i></a></div>
        </div>
        <x-categories/>
        <x-writers/>
    </div>
@endsection