<div class="row mt-5">
	<div class="col">
		<h1># Meet our writers</h1>
	</div>
</div>
<div class="row" style="margin-top: 3%;margin-bottom: 3%;">
	<style type="text/css">
		.user-list {
			padding: 2%; 
			border-radius: 30px; 
			vertical-align: top; 
			font-color: white !important;
		}
	</style>
	<div class="col col-12">
		<ul class="list-inline">
			@foreach($users as $user)
				<li class="list-inline-item m-3 user-list profile-card">
					<div class="user-icon text-center" style="width: 70px;">
						{!! $user->icon !!}
						<a href="{{ url('user/'.$user->name.'/'.$user->id) }}" style="color:white; text-decoration: underline;">
							{{$user->name}}
						</a>
					</div>
				</li>
			@endforeach
		</ul>
	</div>
</div>