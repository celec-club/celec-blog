<div class="row">
	<div class="col">
		<h1># Categories</h1>
	</div>
</div>
<div class="row text-uppercase" style="margin-top: 3%;margin-bottom: 3%;">
	@foreach($categories as $category)
		<div class="col-sm-6 col-md-2" style="margin-top: 1%;">
			<div class="card" style="border-radius: 0;border-width: 0px; cursor: pointer;" onclick='window.location.href = "{{ url('blogs?category='.$category->id) }}";'>
				<div class="card-body category-body" style="text-align: center; border-radius: 22px; {{$category->background}}; ">
					<center>
					<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" style="font-size: 80px;">
						{!!$category->icon!!}
					</svg>
					<h6 class="card-title" style="margin-top: 3%;">{{$category->title}}</h6>
					<p class="card-text"></p>
					</center>
				</div>
			</div>
		</div>
	@endforeach
</div>