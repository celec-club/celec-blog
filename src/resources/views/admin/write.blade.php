@extends("layouts.panel")
@section("title", "Add blog")
@section("content")
	<div class="row">
		<div class="col p-3">
			<div class="p-3">
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
				@if(session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@endif
				<form method="POST" action="{{ url('admin/blog/add') }}" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
						<label for="inputPassword5" class="form-label">Title</label>
						<input name="title" type="text" class="form-control">
					</div>
					<div class="mb-3">
						<label for="inputPassword5" class="form-label">Content (Markdown supproted)</label>
						<textarea name="content"></textarea>
					</div>
					<div class="mb-3">
						@if($categories->isEmpty())
							<div class="alert alert-danger" role="alert">
							  There is no created categories!
							</div>
						@endif
						<select name="category_id" class="form-select" @if($categories->isEmpty()) style="border:1px solid red;" @endif >
						  <option selected>Select category</option>
						  @foreach($categories as $category)
						  	<option value="{{$category->id}}">{{$category->title}}</option>
						  @endforeach
						</select>
					</div>
					<div class="mb-3">
						<label for="inputPassword5" class="form-label">Tags (use <code><strong>,</strong></code> as separator)</label>
						<input name="tags" type="text" class="form-control" placeholder="php,database ...">
					</div>
					<div class="mb-3">
						<select name="user_id" class="form-select">
						  <option selected>Writer</option>
						  @foreach($users as $user)
						  	<option value="{{ $user->id }}">{{$user->name}}</option>
						  @endforeach
						</select>
					</div>
					<div class="mb-3">
					  <label for="formFile" class="form-label">Cover</label>
					  <input name="cover" class="form-control" type="file" id="formFile">
					</div>			
					<div class="mb-3">
						<button type="submit" class="btn btn-outline-success float-end">Done!</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
@endsection