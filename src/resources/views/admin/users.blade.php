@extends("layouts.panel")
@section("title", "Users")
@section("content")
	<div class="row">
		<div class="col p-3">
			<form method="POST" action="{{ url('admin/user/create') }}">
				@csrf
				@if(session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@endif
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
				<div class="mb-3">
				    <label for="exampleInputEmail1" class="form-label">Name</label>
				    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			  	</div>
			  	<div class="mb-3">
				    <label for="exampleInputEmail1" class="form-label">Email</label>
				    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			  	</div>
			  	<div class="mb-3">
				    <label for="exampleInputEmail1" class="form-label">Password</label>
				    <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			  	</div>
				<div class="mb-3">
				    <label for="exampleInputEmail1" class="form-label">Description</label>
				    <textarea name="description">
			  	</div>
			  	<div class="mb-3" x-data="icon()">
				    <label for="exampleInputEmail1" class="form-label">Icon</label>
				    <div class="row">
				    	<div class="col col-1"><div class="icondiv" style="width: 60px;">{!! $icon !!}</div></div>
				    	<div class="col"><h3><i x-on:click="updateIcon()" style="cursor: pointer;" class="bi bi-arrow-repeat"></i></h3></div>
				    </div>
				    <input name="icon" value='{!! $icon !!}' type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			  	</div>
			  	<div class="mb-3">
			  		<button type="submit" class="btn btn-outline-success float-end">Done</button>
			  	</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col p-3">
			<table class="table table-bordered mt-3">
				<thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Delete</th>
				    </tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<th scope="row">{{$loop->iteration}}</th>
							<td>{{$user->name}} <div style="width: 60px;">{!! $user->icon !!}</div> </td>
							<td>{{$user->email}}</td>
							<td>
								<form method="POST" action="{{ url('admin/user/delete') }}">
									@csrf
									<input type="hidden" name="user_id" value="{{ $user->id }}">
									<button class="btn btn-outline-danger">Delete</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $users->links() }}
		</div>
	</div>
@endsection
{{-- @push("scripts") --}}
	<script type="text/javascript">
		function icon() {
			return {
				updateIcon() {
					$.get("/api/icon/generate").then(function(res) {
						$(".icondiv").html(res);
					});
				}
			}
		}
	</script>
{{-- @endpush --}}