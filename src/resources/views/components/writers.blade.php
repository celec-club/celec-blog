<div class="row mt-5">
	<div class="col">
		<h1># Meet our writers</h1>
	</div>
</div>
<div class="row" style="margin-top: 3%;margin-bottom: 3%;">
	<style type="text/css">
		.user-icon:hover {
			-ms-transform: scale(1.05); 
            -webkit-transform: scale(1.05);
            transform: scale(1.2); 
            /*border: 3px solid cornflowerblue;*/
            /*border-radius: 50%;*/
		}
	</style>
	<div class="col col-12">
		<ul class="list-inline">
			@foreach($users as $user)
				<li class="list-inline-item m-3" style="border:0px; vertical-align: top;">
					<div class="user-icon text-center" style="width: 70px;">
						<a href="mailto:{{$user->email}}" style="color:black; text-decoration: none;">{!! $user->icon !!}
							{{$user->name}}
						</a>
					</div>
				</li>
			@endforeach
		</ul>
	</div>
</div>