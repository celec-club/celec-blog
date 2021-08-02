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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('resources/fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ url('resources/css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ url('resources/css/blurry-load.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.1.0/styles/github.min.css">
    <style type="text/css">
        code {
            background-color: rgb(222,222,222, 0.5) !important;
            border-bottom: 1px solid #cfcfcf;
            border-radius: 5px;
        }
    </style>
</head>

<body style="font-family: Mulish, sans-serif;">
    @if(Request::is("b/*") === false)
        <x-nav-bar/>
    @endif
    @yield("content")
    <footer class="footer-basic" style="background: #000000;color: rgb(255,255,255);margin-top: 10%; padding: 5%;">
        <div class="social">
            <a href="#" target="_blank"><i class="icon ion-social-instagram"></i></a>
            <a href="#" target="_blank"><i class="icon ion-social-linkedin"></i></a>
            <a href="#" target="_blank"><i class="icon ion-social-facebook"></i></a>
            <a href="#" target="_blank"><i class="icon ion-social-github"></i></a>
        </div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="https://celec-usthb.com/#video" target="_blank">About</a></li>
            <li class="list-inline-item"><a href="https://celec-usthb.com/#contact" target="_blank">contact</a></li>
        </ul>
        <p class="copyright">Made with love <i style="color: #ff4d4d !important;" class="bi bi-heart-fill"></i> CELEC © 2021</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/turbolinks@5.2.0/dist/turbolinks.min.js"></script>
    <script type="text/javascript" data-turbolinks-eval="false">
        Turbolinks.start();
    </script>
    <script src="{{ url('resources/js/blurry-load.js') }}" data-turbolinks-eval="false"></script>
    <script data-turbolinks-eval="false" src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.1.0/highlight.min.js"></script>
    <script data-turbolinks-eval="false" src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" data-turbolinks-eval="false">
        document.addEventListener('turbolinks:load', function() {
            const blurryImageLoad = new BlurryImageLoad();
            blurryImageLoad.load();
            hljs.highlightAll();
            $("#content").find("img").each(function(key, image) {
                $(image).addClass("img-fluid");
            });
            console.log("What are you looking for ?")
        });
    </script>
</body>

</html>