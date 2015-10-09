@extends('app')

@section('body')
    @include('admin.navbar_top')
    <div class="container">
        <div class="row">
			<div class="main">
				@yield('content')
			</div>
        </div>
    </div>
@stop
