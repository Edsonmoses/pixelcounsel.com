{{--<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>--}}<!DOCTYPE html>
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
    <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!------<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">---------->
    <script src="{{ asset('assets/user/js/ajax.googleapis.js') }}"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="shortcut icon" href="{{ asset('assets/admin/assets/images/favicon.png')}}" />
    <style> 
    body{
        background: #222 !important;
    }
    .lgin{
        text-align: center !important;
        margin: 56px 0 -51px 0;
    }
      /* Hide the browser's default checkbox */
      .form-checked  input {
      position: absolute !important;
      opacity: 0 !important;
      cursor: pointer !important;
      height: 0 !important;
      width: 0 !important;
    }
    .form-checked .texted{
        padding-left: 32px !important;
    }
    .form-checked label{
        font-weight: 100 !important;
    }
    /* Create a custom checkbox */
    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: transparent;
      border-radius: 5px;
      margin-left:15px;
    }

    /* On mouse-over, add a grey background color */
    .form-checked  input ~ .checkmark {
      border: #ccc 1px solid;
    }

    /* When the checkbox is checked, add a blue background */
    .form-checked input:checked ~ .checkmark {
      background-color: #fff100;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark when checked */
    .form-checked  input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the checkmark/indicator */
    .form-checked  .checkmark:after {
      left: 9px;
      top: 5px;
      width: 5px;
      height: 10px;
      border: solid black;
      border-width: 0 3px 3px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }


.form-modal{
    position:relative;
    width:450px;
    height:auto;
    margin-top:4em;
    left:50%;
    transform:translateX(-50%);
    background:#fff;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
    border-bottom-right-radius: 5px;
    box-shadow:0 3px 20px 0px rgba(0, 0, 0, 0.1)
}

.form-modal button{
    cursor: pointer;
    position: relative;
    text-transform: capitalize;
    font-size:1em;
    z-index: 2;
    outline: none;
    background:#fff;
    transition:0.2s;
}

.form-modal .btn{
    border-radius: 5px;
    border:none;
    font-weight: bold;
    font-size:1.2em;
    padding:0.8em 1em 0.8em 1em!important;
    transition:0.5s;
    border:1px solid #ebebeb;
    margin-bottom:0.5em;
    margin-top:0.5em;
}

.form-modal .login , .form-modal .signup{
    background:#fff100;
    color:#222;
}

.form-modal .login:hover , .form-modal .signup:hover{
    background:#cabe1a;
}

.form-toggle{
    position: relative;
    width:100%;
    height:auto;
}

.form-toggle button{
    width:50%;
    float:left;
    padding:1.5em;
    margin-bottom:1.5em;
    border:none;
    transition: 0.2s;
    font-size:1.1em;
    font-weight: bold;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
}

.form-toggle button:nth-child(1){
    border-bottom-right-radius: 1px;
}

.form-toggle button:nth-child(2){
    border-bottom-left-radius: 1px;
}

#login-toggle{
    border-bottom:2px solid #222;
    color:#222;
}

.form-modal form{
    position: relative;
    width:90%;
    height:auto;
    left:50%;
    transform:translateX(-50%);  
}

#login-form , #signup-form{
    position:relative;
    width:100%;
    height:auto;
    padding-bottom:1em;
}

#signup-form{
    display: none;
}


#login-form button , #signup-form button{
    width:100%;
    margin-top:0.5em;
    padding:0.6em;
}

.form-modal input{
    position: relative;
    width:100%;
    font-size:1em;
    padding:1.2em 1.7em 1.2em 1.7em;
    margin-top:0.6em;
    margin-bottom:0.6em;
    border-radius: 5px;
    border:none;
    background:#ebebeb;
    outline:none;
    font-weight: bold;
    transition:0.4s;
}

.form-modal input:focus , .form-modal input:active{
    transform:scaleX(1.02);
}

.form-modal input::-webkit-input-placeholder{
    color:#222;
}


.form-modal p{
    font-size:16px;
    font-weight: bold;
}

.form-modal p a{
    color:#57b846;
    text-decoration: none;
    transition:0.2s;
}

.form-modal p a:hover{
    color:#222;
}


.form-modal i {
    position: absolute;
    left:10%;
    top:50%;
    transform:translateX(-10%) translateY(-50%); 
}

.fa-google{
    color:#dd4b39;
}

.fa-linkedin{
    color:#3b5998;
}

.fa-windows{
    color:#0072c6;
}

.-box-sd-effect:hover{
    box-shadow: 0 4px 8px hsla(210,2%,84%,.2);
}

@media only screen and (max-width:500px){
    .form-modal{
        width:100%;
    }
}

@media only screen and (max-width:400px){
    i{
        display: none!important;
    }
}
          </style>
    @livewireStyles
</head>

<body>
<!-- Navigation -->
{{--<nav lass="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
           <i class="fa fa-bars"></i>
        </button>
      <a class="navbar-brand" href="/"><img src="{{asset('assets/uploads/img/Pixel Counsel--09.svg')}}" class="img-responsive" alt="{{ config('app.name', 'PixelCounsel') }}"></a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            
            <ul class="nav navbar-nav navbar-right">
                @if (Route::has('login'))
                <li>
                    <a href="{{route('login')}}" title="Login">Login</a>
                  </li>
                  <li>
                    <a href="#">|</a>
                  </li>
                  <li>
                    <a href="{{route('register')}}" title="Join us">Join Us</a>
                  </li>
                  <li>
                    <a href="#">|</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i>  Login with facebook</a>
                  </li>
                       
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav> --}} 
<!-- Page Header -->
<div class="login-pages">
 {{$slot}}
  </div>
    <!-- Footer -->
   {{-- <footer class="footer-bs-dark">
        <hr>
        <div class="row">
        	<div class="col-md-2 col-sm-12 footer-brand animated fadeInDown">
            	<a class="pull-left footer-brands" href="{{ url('/') }}"><img src="{{asset('assets/uploads/img/Pixel Counsel--09.svg')}}" class="img-responsive" alt="{{ config('app.name', 'pixelcounsel') }}"> </a>
                
            </div>
            	<div class="col-md-3 footer-brand md animated fadeInLeft">
                    <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
                    <p>© 2014 BS3 UI Kit, All rights reserved</p>
                </div>
            	<div class="col-md-2  footer-nav animated fadeInUp">
                    <ul class="list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
        	<div class="col-md-2 footer-social animated fadeInDown">
            	<h4>Follow Us</h4>
            	<ul>
                	<li><a href="#">Facebook</a></li>
                	<li><a href="#">Twitter</a></li>
                	<li><a href="#">Instagram</a></li>
                	<li><a href="#">RSS</a></li>
                </ul>
            </div>
        	<div class="col-md-3 footer-ns animated fadeInRight">
            	<h4>Newsletter</h4>
                <p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
                <p>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                      </span>
                    </div><!-- /input-group -->
                 </p>
            </div>
        </div>
    </footer> --}} 

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
 function toggleSignup(){
   document.getElementById("login-toggle").style.borderBottom="solid 2px #fff";
    document.getElementById("login-toggle").style.color="#222";
    document.getElementById("signup-toggle").style.borderBottom="solid 2px #222";
    document.getElementById("signup-toggle").style.color="#222";
    document.getElementById("login-form").style.display="none";
    document.getElementById("signup-form").style.display="block";
}

function toggleLogin(){
    document.getElementById("login-toggle").style.borderBottom="solid 2px #222";
    document.getElementById("login-toggle").style.color="#222";
    document.getElementById("signup-toggle").style.borderBottom="solid 2px #fff";
    document.getElementById("signup-toggle").style.color="#222";
    document.getElementById("signup-form").style.display="none";
    document.getElementById("login-form").style.display="block";
}

  
  </script>
    @livewireScripts
</body>

</html>
