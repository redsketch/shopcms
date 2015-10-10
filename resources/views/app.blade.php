<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">
        <link href="favicon.ico" rel="icon">
        <title>{{ $site->name or 'Shop CMS' }}</title>
        <base href="/">
        <!-- Styles -->
        <!-- Bootstrap core style -->
        <link rel="stylesheet" href="{{ asset('/assets/components/bootstrap/dist/css/bootstrap.min.css') }}">

        <!-- Default style -->
        <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">

        <!-- Additional style -->
        @stack('style')

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}">
        <!--<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,300">-->
        <!-- #Styles -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- Scripts -->
        @stack('head-script')
    </head>
    <body>

        @section('body')
        @show

        @section('components')
        @show
        <!-- Scripts -->
        <!-- jQuery core script -->
        <script src="{{ asset('/assets/components/jquery/dist/jquery.min.js') }}"></script>
        
        <!-- Bootstrap core script -->
        <script src="{{ asset('/assets/components/bootstrap/dist/js/bootstrap.js') }}"></script>

        <!-- Default script -->
        <script src="{{ asset('/assets/js/script.js') }}"></script>

        <!-- Additional body script -->
        @stack('body-script')
        <!-- #Scripts -->        
    </body>
</html>
