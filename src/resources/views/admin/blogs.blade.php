@extends("layouts.panel")
@section("title", "Panel")
@section("content")
	<div class="row">
		<div class="col p-3">
			<div class="form-group">
				<form method="get">
			    	<input @if(!is_null($search)) value="{{$search}}"  @endif name="search" placeholder="search here" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				</form>
		  	</div>
		  	<hr/>
		  	<table class="table table-bordered">
			<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Link</th>
			      <th scope="col">Views</th>
			      <th scope="col">Action</th>
			    </tr>
			</thead>
			<tbody>
				@foreach($blogs as $blog)
			    	<tr>
			      		<th scope="row">{{$loop->iteration}}</th>
			      		<td>{{ $blog->title }}</td>
			      		<td><a target="_blank" href="{{ url('b/'.$blog->slug) }}">{{$blog->slug}}</a></td>
			      		<td>{{$blog->views}}</td>
			      		<td>
			      			<form method="post" action="{{ url('admin/blog/delete') }}">
			      				@csrf
			      				<input type="hidden" name="blog_id" value="{{ $blog->id }}">
			      				<button type="submit" class="btn btn-outline-danger">Delete</button>
			      			</form>
			      			<br>
			      			<a href="{{ url('admin/blog/modify/'.$blog->id) }}"><button class="btn btn-outline-success">Modify</button></a>
			      		</td>
			    	</tr>
		    	@endforeach
			</tbody>
		</table>
		{{ $blogs->links() }}
		</div>
	</div>
@endsection