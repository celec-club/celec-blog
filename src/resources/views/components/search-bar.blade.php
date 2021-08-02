<div class="row">
	<div class="col">
		<form method="get" action="{{ url('blogs') }}">
			<div class="input-group"><input value="{{ Request::query("query") }}" name="query" class="form-control form-control-lg" type="text" placeholder="Looking for something ?" style="border-color: rgb(234,234,234);border-bottom-color: rgb(197,197,197);"></div>
		</form>
	</div>
</div>