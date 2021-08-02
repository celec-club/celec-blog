@extends("layouts.app")
@section("title", $blog->title)
@section("content")
    <div class="container-fluid" style="padding: 0px;">
        <div class="card" style="background-attachment: fixed; background: url('{{url('storage/app/'.$blog->image->path)}}') center / cover no-repeat;height: 65vh;border-radius: 0px;border-width: 0px;">
            <div class="card-img-overlay" style="top: 70% !important;color: rgb(255,255,255);background: rgba(0,0,0,0.39);padding: 1%; border-radius: 0px;">
                <h1><span style="text-decoration: underline;">{{$blog->title}}</span></h1>
                <p>{{ date_format($blog->created_at, "Y-m-d")}} {{$blog->readingTime()}}</p>
            </div>
            <div><a href="{{ url('blogs') }}"><i class="fa fa-long-arrow-left" style="font-size: 46px;background: rgba(0,0,0,0.39);color: rgb(255,255,255);padding: 1%;border-bottom-right-radius: 8px;"></i></a></div>
        </div>
    </div>
    <div class="container" style="padding-top: 3%;">
        <div class="row">
            <div class="col">
                <div style="font-size: 18px;" id="content">
                    {!! $content !!}
                </div>
                <br>
                <h1 class="text-muted" style="font-size: 14px;">By: <a href="mailto:{{$blog->email}}">{{$blog->writer}}</a></h1>
                <hr>
                <ul class="list-inline">
                    @foreach($blog->tags as $tag)
                    <li class="list-inline-item" style="margin-top: 1%;color: black !important;"><span class="badge bg-primary border-primary" style="background: rgb(222,222,222) !important;color: black !important;padding: 10px;border-bottom: 1px solid rgb(167,167,167) !important;font-size: 18px;"><a href="{{ url('blogs?tag='.$tag->name) }}">#{{$tag->name}}</a></span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
@push("scripts")
    
    {{-- <script data-turbolinks-eval="false" ></script> --}}
@endpush