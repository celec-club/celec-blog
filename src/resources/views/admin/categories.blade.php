@extends("layouts.panel")
@section("title", "Categories")
@section("content")
	<div class="row">
		<div class="col p-3">
			<div class="p-3">
				<form method="POST" action="{{ url('admin/category') }}">
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
					    <label for="exampleInputEmail1" class="form-label">Title</label>
					    <input name="title" type="text" class="form-control">
					</div>
					<div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Icon (Copy the icon html path from <a target="_blank" href="https://icons.getbootstrap.com/">here</a>)</label>
					    <input name="icon" type="text" class="form-control">
					</div>
					<div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Color (Copy the css from <a target="_blank" href="https://cssgradient.io">here</a>)</label>
					    <input name="background" type="text" class="form-control">
					</div>
					<div class="mb-3">
					    <button class="btn btn-outline-success float-end">Create!</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<hr/>
	<div class="col p-3">
		<table class="table table-bordered">
			<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Icon</th>
			      <th scope="col">Color</th>
			      <th scope="col">Action</th>
			    </tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
			    	<tr>
			      		<th scope="row">{{$loop->iteration}}</th>
			      		<td>{{$category->title}}</td>
			      		<td><center><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" style="font-size: 50px;">{!! $category->icon !!}</svg></center></td>
			      		<td>
			      			<center>
				      			<div style="height: 50px; border-radius: 8px;  width: 50px; {!! $category->background; !!}"></div>
				      		</center>
			      		</td>
			      		<td>
			      			<form method="POST" action="{{ url('admin/category/delete') }}">
			      				@csrf
			      				<input type="hidden" name="category_id" value="{{$category->id}}">
			      				<button class="btn btn-outline-danger">Delete</button>
			      			</form>
			      		</td>
			    	</tr>
		    	@endforeach
			</tbody>
		</table>
	</div>
@endsection