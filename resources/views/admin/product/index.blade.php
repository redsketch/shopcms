@extends('admin.body')

@section('content')
<div class="col-lg-offset-1 col-lg-10 col-lg-offset-1">
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
	
	<div class="row">
		<div class="col-lg-12">
			<div class="text-right">
				<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#product-dialog" data-action="new" id="add-product">
					<span class="fa fa-plus"><span class="sr-only sr-only-focusable">(add new)</span></span>
				</button>
			</div>
		</div>
	</div>
	
	<div class="row top-spacing">
		<div class="col-lg-12">
			<table class="table table-bordered table-hover" id="products-table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>code</th>
						<th>price</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>*</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>	
</div>
@include('admin.product.components.dialog_form')
@endsection

@push('style')
<!--
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.css">
-->
<link rel="stylesheet" type="text/css" href="assets/components/dataTables/media/css/jquery.dataTables.css">
@endpush

@push('body-script')
<script type="text/javascript" src="assets/components/dataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/js/product.js"></script>
@endpush
