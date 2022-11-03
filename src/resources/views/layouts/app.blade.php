<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="google-site-verification" content="NMpxf6Yp4Qa9xKSA4VjZozhgWgAvD5QANdymWKLFilI" />
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
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.1.0/styles/agate.min.css">
    @livewireStyles
    <style type="text/css">
        code {
            border-radius: 7px;
        }
        .profile-card {
            background: linear-gradient(59deg, #000000, #454545, #454545, #032e61, #000000, #454545, #454545, #454545, #000000, #0d0b63, #a4dbad);
            background-size: 2200% 2200%;
            -webkit-animation: AnimationName 10s ease infinite;
            -moz-animation: AnimationName 10s ease infinite;
            -o-animation: AnimationName 10s ease infinite;
            animation: AnimationName 10s ease infinite;
        }

        @-webkit-keyframes AnimationName {
            0%{background-position:0% 72%}
            50%{background-position:100% 29%}
            100%{background-position:0% 72%}
        }
        @-moz-keyframes AnimationName {
            0%{background-position:0% 72%}
            50%{background-position:100% 29%}
            100%{background-position:0% 72%}
        }
        @-o-keyframes AnimationName {
            0%{background-position:0% 72%}
            50%{background-position:100% 29%}
            100%{background-position:0% 72%}
        }
        @keyframes AnimationName {
            0%{background-position:0% 72%}
            50%{background-position:100% 29%}
            100%{background-position:0% 72%}
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
            <a href="https://www.instagram.com/celec_usthb" target="_blank"><i class="icon ion-social-instagram"></i></a>
            <a href="https://dz.linkedin.com/company/celecusthb" target="_blank"><i class="icon ion-social-linkedin"></i></a>
            <a href="https://www.facebook.com/CELECUSTHB/" target="_blank"><i class="icon ion-social-facebook"></i></a>
            <a href="https://github.com/CELEC-USTHB-CLUB/celec-blog" target="_blank"><i class="icon ion-social-github"></i></a>
        </div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="http://usthb-celec.com/home#about" target="_blank">About</a></li>
            <li class="list-inline-item"><a href="http://usthb-celec.com/home#footer" target="_blank">contact</a></li>
        </ul>
        <p class="copyright">Made with love <i style="color: #ff4d4d !important;" class="bi bi-heart-fill"></i> CELEC © 2021</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script data-turbolinks-eval="false" src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.1.0/highlight.min.js"></script>
    <script data-turbolinks-eval="false" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script data-turbolinks-eval="false" src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        hljs.highlightAll();
    </script> 
    @livewireScripts
</body>

</html>
