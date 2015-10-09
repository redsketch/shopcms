@extends('admin.body')

@section('content')
<div class="col-lg-offset-4 col-lg-4">
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
	 
	<form action="{{ url("/store/update/{$store->id}")}}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<dl class="form-group">
			<dt><label for="store-name">Store name:</label></dt>
			<dd><input type="text" name="name" id="store-name" class="form-control" required="true" value="{{ $store->name or '' }}"></dd>
		</dl>
		<h3>Address</h3>
		<dl class="form-group">
			<dt><label for="store-address">Address:</label></dt>
			<dd><input type="text" name="address" id="store-address" class="form-control" required="true" value="{{ $store->address or '' }}"></dd>
		</dl>
		<h3>Contact</h3>
		<dl class="form-group">
			<dt><label for="store-email">Store e-mail:</label></dt>
			<dd><input type="text" name="email" id="store-email" class="form-control" required="true" value="{{ $store->email or '' }}"></dd>
		</dl>
		<dl class="form-group">
			<dt><label for="store-phone-1">Phone 1#:</label></dt>
			<dd><input type="text" name="phone1" id="store-phone-1" class="form-control" required="true" value="{{ $store->phone1 or '' }}"></dd>
		</dl>
		<dl class="form-group">
			<dt><label for="store-phone-2">Phone 2#:</label></dt>
			<dd><input type="text" name="phone2" id="store-phone-2" class="form-control" required="true" value="{{ $store->phone2 or '' }}"></dd>
		</dl>
		<input type="submit" name="submit" value="Update" class="btn btn-success">
	</form>
</div>
@endsection

