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
	 
	<table class="table table-bordered table-hover" id="products-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>code</th>
                <th>price</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.css">
@endpush

@push('body-script')
<script type="text/javascript" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.js"></script>

<script>
$(function() {
    $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'products/list',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'code', name: 'code' },
            { data: 'price', name: 'price' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush
