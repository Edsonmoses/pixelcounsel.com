<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'PixelCounsel') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{ asset('assets/user/css/clean-blog.min.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/user/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!------<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">---------->
    <link rel="shortcut icon" href="{{ asset('assets/admin/assets/images/favicon.png')}}" />
    <script src="{{ asset('assets/user/js/ajax.googleapis.js') }}"></script>
    @livewireStyles
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
         <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand brand-md-none" href="/"><img src="{{asset('assets/uploads/img/Pixel Counsel--09.svg')}}" class="img-responsive" alt="{{ config('app.name', 'PixelCounsel') }}"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav me-auto mb-2 mb-lg-0 ml-2 navbar-right">
         @if (Route::has('login'))
            <li>
                <a href="{{route('login')}}" title="Login">Login</a>
              </li>
              <li class="d-sm-none">
                <a href="#">|</a>
              </li>
              <li>
                <a href="{{route('register')}}" title="Join us">Join Us</a>
              </li>
              <li class="d-sm-none">
                <a href="#">|</a>
              </li>
              <li>
                <a href="{{ route('facebook.login') }}"><i class="fa fa-facebook-square" aria-hidden="true"></i>  Login with facebook</a>
              </li>
                       
           @endif
      </ul>
    </div>
  </div>
</nav>

<!-- Page Header -->
 {{$slot}}
    <!-- Footer -->
    <footer class="footer-bs-dark">
      <div class="container">
        <hr>
        <div class="row">
        	<div class="col-md-2 col-sm-12 footer-brand animated fadeInDown">
            	<a class="pull-left footer-brands" href="{{ url('/') }}"><img src="{{asset('assets/uploads/img/Pixel Counsel--11.svg')}}" class="img-responsive" alt="{{ config('app.name', 'pixelcounsel') }}"> </a>
                
            </div>
            	<div class="col-md-4 footer-brand md animated fadeInLeft">
                <p style="margin-top: 5px !important;">pixelcounsel a community of designers by designers in africa sharing resources and information</p>
                <p><?php echo date("Y");?> Pixelcounsel. All logos © their respective owners</p>
                </div>
            	<div class="col-md-2  footer-nav animated fadeInUp">
                    <ul class="list h-100">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Shop</a></li>
                    </ul>
                </div>
        	<div class="col-md-2 footer-nav animated fadeInDown">
            	<ul class="list h-100 mt-10">
                	<li><a href="#">Community</a></li>
                	<li><a href="#">Blog</a></li>
                	<li><a href="#">Meetups</a></li>
                	<li><a href="#">Newsletter</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Handbook</a></li>
                  <li><a href="#">Brand Guidelines</a></li>
                </ul>
            </div>
            <div class="col-md-2 footer-nav animated fadeInDown">
            	<ul class="list h-100 mt-9">
                	<li><a href="#">Connect</a></li>
                	<li><a href="#">Find Designers</a></li>
                	<li><a href="#">Job for Designers</a></li>
                	<li><a href="#">Teams</a></li>
                  <li><a href="#">Advertise</a></li>
                  
                </ul>
            </div>
           <!-- <div class="col-md-3 footer-ns animated fadeInRight">
            	<h4>Newsletter</h4>
                <p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
                <p>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter your email">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                      </span>
                    </div><!-- /input-group --
                 </p>
            </div>-->
        </div>
      </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('assets/user/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/user/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{ asset('assets/user/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('assets/user/js/contact_me.js') }}"></script>

    <!-- Theme JavaScript -->
    <script src="{{ asset('assets/user/js/clean-blog.min.js') }}"></script>
    <script>
         $(window).load(function(){        
   $('#myModal').modal('show');
    }); 
    </script>
    @livewireScripts
</body>

</html>