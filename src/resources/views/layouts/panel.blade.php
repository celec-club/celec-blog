<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mulish&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ url('resources/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ url('resources/css/styles.min.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style type="text/css">
        .activePanel {
            border-left:5px solid cornflowerblue;
        }
    </style>
</head>

<body style="font-family: Mulish, sans-serif;">
    <div class="container" style="margin-top: 5%;">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <ul class="list-group text-center">
                    <li class="list-group-item @if(Request::is('admin/panel')) activePanel @endif"><span><a href="{{ url('admin/panel') }}">Panel</a></span></li>
                    <li class="list-group-item @if(Request::is('admin/write*')) activePanel @endif"><span><a href="{{ url('admin/write') }}">Write a blog</a></span></li>
                    <li class="list-group-item @if(Request::is('admin/blogs*')) activePanel @endif"><span><a href="{{ url('admin/blogs') }}">Blogs</a></span></li>
                    <li class="list-group-item @if(Request::is('admin/categories*')) activePanel @endif"><span><a href="{{ url('admin/categories') }}">Categories</a></span></li>
                    <li class="list-group-item @if(Request::is('admin/users*')) activePanel @endif"><span><a href="{{ url('admin/users') }}">Users</a></span></li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-9 p-3" style="border: 1px solid rgb(227,227,227);border-radius: 4px;">
                @yield("content")
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        var simplemde = new SimpleMDE();
    </script>
    
</body>
</html>