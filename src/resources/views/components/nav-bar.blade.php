<nav class="navbar navbar-light navbar-expand-md navigation-clean" style="width: 100%;">
	<div class="container-fluid container-fluid" style="width: 100% !important;"><a href="{{  url('/') }}"><img src="{{url('public/logo.jpg')}}" style="width: 64px;"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navcol-1">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item"><a class="nav-link @if(Request::is('/')) active @endif" href="{{ url('/') }}">Home</a></li>
				<li class="nav-item"><a class="nav-link @if(Request::is('blogs') OR Request::is('blogs/*')) active @endif" href="{{ url('blogs') }}">Browse</a></li>
				<li class="nav-item"><a target="_blank" class="nav-link" href="http://celec-club.com/home">celec-club</a></li>
			</ul>
		</div>
	</div>
</nav>