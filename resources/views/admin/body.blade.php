@extends('app')

@section('body')
    @include('admin.navbar_top')
    <div class="container">
        <div class="row">
            @if (isset($sideBar))
                <div class="col-sm-3 col-md-2 sidebar">
                    @include('member.partials.sidebar_options')
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    @yield('content')
                </div>
            @else
                <div class="main">
                    @yield('content')
                </div>
            @endif
        </div>
    </div>
@stop
