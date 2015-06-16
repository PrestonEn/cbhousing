<!DOCTYPE html>
<html lang="en">
<head>	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CBH</title>
        <link rel="shortcut icon" href="img/logos/supa-small.ico">
        <!-- font awesome -->

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        <!-- Latest compiled and minified CSS -->


<!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
<!--image viewr-->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="css/bootstrap-image-gallery.min.css">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/screen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
    
    <style type="text/css">
        .nav{
            margin-bottom: 40px;
            margin-top:20px;
        }
        .topbtn{
    display: block;
    width: 200px;
    margin: 10px auto 10px auto;
        }
    </style>

</head>

<body>

           
    @include('partials/header')

    
    @yield('flash')

        @if($errors->any())
        <style type="text/css">
        .errors{
            text-align: center;
        }
        </style>
        <div class='row'>
            <div class="alert alert-danger errors">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        </div>
        @endif


        
        
    @yield('content')

	<!-- Scripts -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('js/lightbox.js')}}"></script>

    <script type="text/javascript">
        $('div.home').addClass('active');
        $('div.alert').delay(3000).slideUp(300);
    </script>

</body>
</html>
