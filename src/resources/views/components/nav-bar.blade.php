<nav class="navbar navbar-light navbar-expand-md navigation-clean" style="width: 100%;">
	<div class="container-fluid container-fluid" style="width: 100% !important;"><a href="{{  url('/') }}"><img src="https://scontent.falg6-1.fna.fbcdn.net/v/t1.6435-9/72714018_2619515504736071_7381943502055145472_n.png?_nc_cat=100&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeF6BEth8v-QptEqCmrI22SnWeoEDcsSxcVZ6gQNyxLFxfOTfFLXfIiQhBa6Z8NRBhpwVWWeywCwG6pkU3u5jMh7&_nc_ohc=jVjRmSV7rIgAX-dMrWD&_nc_ht=scontent.falg6-1.fna&oh=00_AT87nEHaTWHy5aym5uZaYBUpGACquqDDiM4sqNuXrAiuKA&oe=626814B9" style="width: 64px;"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navcol-1">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item"><a class="nav-link @if(Request::is('/')) active @endif" href="{{ url('/') }}">Home</a></li>
				<li class="nav-item"><a class="nav-link @if(Request::is('blogs') OR Request::is('blogs/*')) active @endif" href="{{ url('blogs') }}">Browse</a></li>
				<li class="nav-item"><a target="_blank" class="nav-link" href="https://celec-usthb.com/">celec-usthb</a></li>
			</ul>
		</div>
	</div>
</nav>