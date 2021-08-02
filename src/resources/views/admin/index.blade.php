@extends("layouts.panel")
@section("title", "Panel")
@section("content")
	<div class="row g-2">
		<div class="col p-3 ">
			<div class="p-3 rounded-3 text-center border" style="border-bottom: 3px solid #dedede !important;">
				<h3>Total posts: {{$data->blogs}}</h3>
			</div>
		</div>
		<div class="col p-3 ">
			<div class="p-3 rounded-3 text-center border" style="border-bottom: 3px solid #dedede !important;">
				<h3>Total views: {{$data->views}}</h3>
			</div>
		</div>
	</div>
@endsection