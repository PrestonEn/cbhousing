<!DOCTYPE html>
<html lang="en">
<head>	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>CBH</title>
		<link rel="shortcut icon" href="/img/logos/supa-small.ico">
        <!-- font awesome -->

		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        <!-- Latest compiled and minified CSS -->


<!-- Latest compiled and minified JavaScript -->
<!--image viewr-->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap-image-gallery.min.css')}}">

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">
    
    <link href="{{ asset('/css/carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/screen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
    
    <style type="text/css">
        .floatLeft{ color: #f9a155 !important; }
    </style>
    @yield('css-assets')
</head>

<body>
    
<div id="wrapper">
<div id="header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid top-margin-fix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="{{url('/')}}">
                    <img id="big-logo" src="{{ asset('/img/CBH_logo.png') }}">
                    <img id="small-logo" src="{{ asset('/img/logos/supa-small.png') }}">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="myNav">
                <ul class="nav navbar-nav navbar-right" id="menu">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ url('/properties') }}">Properties</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ url('/about') }}">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ url('/#contact') }}">Contact Us</a>
                    </li>
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
                        <li>
                            <a href="{{url('/user/'.Auth::user()->id)}}">{{ Auth::user()->name }} </a> 
                        </li>
						<li>
                            <a href="{{ url('/auth/logout') }}">Logout</a></li>  
                        </li>
					@endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>

@if($errors->any())
<style type="text/css">
.errors{
    text-align: center;
}
</style>
<div class='row'>
    <div class="alert alert-danger errors" style="padding-top:120px !important;">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
</div>
@endif

<div id="content">
	@yield('content')
</div>
    <!-- Scripts -->

 
     <footer id="footer">
<section class="footer page-foot">
    <div class='row'>
        <div class="link-container">
            <h5>Visit Us On:</h5>
        <ul class="media-links"> 
            <a target="_blank" href="https://www.facebook.com/Crossborderhousing"><li><img src="{{ asset('/img/fbook.png') }}" alt=""></a>
            <a target="_blank" href="https://twitter.com/cbhbrock"><li><img src="{{ asset('/img/twitter.png') }}" alt=""></a>
            <a target="_blank" href="https://www.youtube.com/watch?v=FuZ3HQntTwc"><li><img src="{{ asset('/img/youtube.png') }}" alt=""></a>
        </ul>
        </div>
        <hr width="100%" align="center" color="white">
    </div>

    <div class='row'>
    <div class="row cpright">
        <h5 class="itybity">Copyright &copy; Cross Border Housing Inc.</h5>
    </div>
    </div>
    </section>
    </footer>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('js/lightbox.js')}}"></script>
    <script src="{{asset('js/hideme.js')}}"></script>
</div>

@yield('modals')


@if( Session::has('message')) 
    <script type="text/javascript">
    jQuery.noConflict();
    
        $(document).ready(function() {
            $('#popupmodal').modal('show');
        });
    </script>

<div class="modal fade" id="popupmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{Session::get('title')}}</h4>
      </div>
      <div class="modal-body">
        <p>{{Session::get('message')}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif
<!-- Latest compiled and minified JavaScript -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> --}}
    <script type="text/javascript">
        $('div.home').addClass('active');
        $('div.alert').delay(3000).slideUp(30);

    </script>
</body>
</html>

