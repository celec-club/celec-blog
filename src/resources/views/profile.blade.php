@extends("layouts.app")
@section("title", $user->name." profile")
@section('meta-tags')
    <meta property="og:title" content="{{$user->name}} profile, CELEC blog.">
    <meta name="description" content="{{ $user->description }}">
    <meta property="og:image" content="{!! $user->icon !!}">
    <meta property="og:type" content="profile">
@endsection
@section("content")
<style type="text/css">
    .blog-zoom:hover {
        -ms-transform: scale(1.05);
        -webkit-transform: scale(1.05);
        transform: scale(1.01);
    }
</style>
<div class="container" style="margin-top: 3%;border-bottom-color: rgb(33, 37, 41);">
    <x-search-bar />
    <x-user-profile-card :user="$user" />
    <div class="row" style="margin-top: 3%;">
        <? $blogs = $user->blogs()->paginate(12)->withQueryString(); ?>
        @foreach($blogs as $blog)
            <x-blog :blog="$blog" />
        @endforeach
        <br />
    </div>
    <div class="row mt-3">
        <div class="col ">
            {{ $blogs->links() }}
        </div>
    </div>
    <hr style="color: rgb(125,125,125);">
    <x-categories />
    <x-writers/>
</div>
@endsection