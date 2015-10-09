@extends('admin.body')

@section('content')
<div class="col-lg-offset-2">
	{{-- Global responses will shown here --}}
	@if (Session::get('response')['status'])
	<div class="alert alert-{{ Session::get('response')['status'] }} small" role="alert">
		{!! Session::get('response')['msg'] !!}
	</div>
	@endif
	@if (count($errors) > 0)
	<div class="alert alert-danger small">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	 
	
</div>
@endsection

