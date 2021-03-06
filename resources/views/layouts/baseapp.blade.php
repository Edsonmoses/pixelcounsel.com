<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'PixelCounsel') }}</title>

    <!-- Bootstrap Core CSS -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <link href="{{ asset('assets/user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.css" />

    <!-- Theme CSS -->
    <link href="{{ asset('assets/user/css/clean-blog.min.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/user/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?fmily=Be+Vietnam+Pro:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?
    
    mily=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  
    <script src="{{ asset('assets/user/js/ajax.googleapis.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('assets/uploads/img/PCl-Fav.png')}}" />
    <script src="https://cdn.tiny.cloud/1/k8q9tgside9eky8q9awxina5c3fwpwso4mslw3530tjl39hj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
     <!-- Global site tag (gtag.js) - Google Analytics -->
     <script async src="https://www.googletagmanager.com/gtag/js?id=UA-217785215-1"></script>
     <script>
       window.dataLayer = window.dataLayer || [];
       function gtag(){dataLayer.push(arguments);}
       gtag('js', new Date());
 
       gtag('config', 'UA-217785215-1');
     </script>
      <style>
        .tox:not([dir=rtl]) .tox-statusbar__branding {
                margin-left: 1ch;
                display: none !important;
            }}
        </style>
    @livewireStyles
</head>

<body>
  {{-- @include('cookieConsent::index') --}}
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <div class="navbar-header">
        <span class="navbar-toggle d-md-none d-lg-none" onclick="openNav()">
          <span class="sr-only">Toggle navigation</span>
          <i class="fa fa-bars"></i>
        </span>
        <button type="button" class="navbar-toggle d-sm-none" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
           <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand brand-md-none" href="/"><img src="{{asset('assets/uploads/img/Pixel Counsel--09.svg')}}" class="img-responsive" alt="{{ config('app.name', 'PixelCounsel') }}"></a>
      <a class="navbar-brand brand-sm-none" href="/"><img src="{{asset('assets/uploads/img/PC Logo.svg')}}" class="img-responsive" alt="{{ config('app.name', 'PixelCounsel') }}"></a>
      </div>
      <div class="collapse navbar-collapse d-sm-none d-xm-none" id="bs-example-navbar-collapse-1">
        <div class="m-menu">
          <ul class="nav navbar-nav me-auto mb-2 mb-lg-0 ml-2 menu-actives">
            <li class="nav-item">
              <a class="nav-link" href="/vector">VECTOR LOGOS
                <span class="{{ (request()->is('vector*')) ? 'vector-arrows' : '' }} d-none d-sm-block d-sm-none d-md-block"></span>
              </a>
            </li>
            <li>
              <a href="/hookup">HOOKUP
                <span class="{{ (request()->is('hookup*')) ? 'hookup-arrows' : '' }} d-none d-sm-block d-sm-none d-md-block"></span>
              </a>
            </li>
            <li>
              <a href="/jargon">JARGON BUSTER
                <span class="{{ (request()->is('jargon*')) ? 'jargon-arrows' : '' }} d-none d-sm-block d-sm-none d-md-block"></span>
              </a>
            </li>
            <li>
              <a href="/events">EVENTS
                <span class="{{ (request()->is('events*')) ? 'events-arrows' : '' }} d-none d-sm-block d-sm-none d-md-block"></span>
              </a>
            </li>
            {{-- <li>
              <a href="/blog">BLOG
                <i class="fa fa-comments" aria-hidden="true"></i>
                <span class="{{ (request()->is('blog*')) ? 'blog-arrows' : '' }}"></span>
              </a>
            </li>--}}
          </ul>
        </div>
        @if (Route::has('login'))
          @auth
              @if (Auth::user()->utype === 'ADM')
                <!--//Admin-->
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="My Account">My Account ({{Auth::user()->name}}) <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{route('admin.dashboard')}}" title="dashboard">Dashboard</a></li>
                    <li><a href="{{route('admin.categories')}}" title="blog categories">Blog Categories</a></li>
                    <li><a href="{{route('admin.vectors')}}" title="vector categories">Vector Categories</a></li>
                    <li><a href="{{route('admin.events')}}" title="event categories">Event Categories</a></li>
                    <li><a href="{{route('admin.hookups')}}" title="hookup categories">Hookup Categories</a></li>
                    <li><a href="{{route('admin.jargons')}}" title="jargon categories">Jargon Categories</a></li>
                    <li><a href="{{route('admin.vectorlogos')}}" title="Vector Logos">All Vectors</a></li>
                    <li><a href="{{route('admin.hookup')}}" title="Hookup">All Hookups</a></li>
                    <li><a href="{{route('admin.jargon')}}" title="Jargon">All Jargons</a></li>
                    <li><a href="{{route('admin.event')}}" title="Event">All Events</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{route('logout')}}" onclick="event.preventDefault();  document.getElementById('logout-form') .submit();">Logout</a></li>
                    <form id="logout-form" method="POST" action="{{route('logout')}}">
                      @csrf
                      
                    </form>
                  </ul>
                </li>
                </ul>
              @else
              <!--//user-->
              <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="My Account">My Account ({{Auth::user()->name}}) <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{route('user.dashboard')}}" title="dashboard">Dashboard</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{route('logout')}}" onclick="event.preventDefault();  document.getElementById('logout-form') .submit();">Logout</a></li>
                    <form id="logout-form" method="POST" action="{{route('logout')}}">
                      @csrf
                    </form>
                  </ul>
                </li>
              </ul>
              @endif
          @else
              <ul class="nav navbar-nav navbar-right right-menu">
                <li>
                    <a href="{{route('login')}}" title="Login">Login</a>
                  </li>
                  <li class="d-none d-sm-block d-sm-none d-md-block">
                    <a href="#">|</a>
                  </li>
                  <li>
                    <a href="{{route('register')}}" title="Join us">Join Us</a>
                  </li>
                  {{-- <li  class="d-none d-sm-block d-sm-none d-md-block">
                    <a href="#">|</a>
                  </li>
                  {{-- <li>
                    <a href="{{ route('facebook.login') }}"><i class="fa fa-facebook-square" aria-hidden="true"></i>  Login with facebook</a>
                  </li>--}}
               </ul>
          @endauth
        @endif
      
      </div>
      <div id="myNav" class="overlay d-md-none d-lg-none">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
          <div class="m-menu">
            <ul class="nav navbar-nav me-auto mb-2 mb-lg-0 ml-2 menu-actives">
              <li class="nav-item">
                <a class="nav-link" href="/">HOME</a>
                <hr/>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/vector">VECTOR LOGOS
                  <span class="{{ (request()->is('vector*')) ? 'vector-arrows' : '' }} d-none d-sm-block d-sm-none d-md-block"></span>
                </a>
              </li>
              <li>
                <a href="/hookup">HOOKUP
                  <span class="{{ (request()->is('hookup*')) ? 'hookup-arrows' : '' }} d-none d-sm-block d-sm-none d-md-block"></span>
                </a>
              </li>
              <li>
                <a href="/jargon">JARGON BUSTER
                  <span class="{{ (request()->is('jargon*')) ? 'jargon-arrows' : '' }} d-none d-sm-block d-sm-none d-md-block"></span>
                </a>
              </li>
              <li>
                <a href="/events">EVENTS
                  <span class="{{ (request()->is('events*')) ? 'events-arrows' : '' }} d-none d-sm-block d-sm-none d-md-block"></span>
                </a>
              </li>
              {{-- <li>
                <a href="/blog">BLOG
                  <i class="fa fa-comments" aria-hidden="true"></i>
                  <span class="{{ (request()->is('blog*')) ? 'blog-arrows' : '' }}"></span>
                </a>
              </li>--}}
              @if (Route::has('login'))
            @auth
                @if (Auth::user()->utype === 'ADM')
                <li> 
                  <hr/>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="My Account">My Account ({{Auth::user()->name}}) <span class="caret"></span></a></li>
                <li><a href="{{route('admin.dashboard')}}" title="dashboard">Dashboard</a></li>
                @else
                <li>
                   <hr/>
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="My Account">My Account ({{Auth::user()->name}}) <span class="caret"></span></a></li>
                <li><a href="{{route('user.dashboard')}}" title="dashboard">Dashboard</a></li>
                @endif
              @else
                <li>
                  <hr/>
                    <a href="{{route('login')}}" title="Login">Login</a>
                  </li>
                  <li class="d-none d-sm-block d-sm-none d-md-block">
                  </li>
                  <li>
                    <a href="{{route('register')}}" title="Join us">Join Us</a>
                  </li>
                  {{-- <li  class="d-none d-sm-block d-sm-none d-md-block">
                    <a href="#">|</a>
                  </li>
                  {{-- <li>
                    <a href="{{ route('facebook.login') }}"><i class="fa fa-facebook-square" aria-hidden="true"></i>  Login with facebook</a>
                  </li>--}}
              @endauth
              @endif
             <li>
                <hr/>
                <a href="#">Advertise</a></li>
                <li><a href="/hookup">Find A Creative's Job</a></li>
                @if (Auth::check())
                <li><a href="{{route('hookup.addhookup')}}">Post A Creative's Job</a></li>
                @else
                <li><a href="{{route('login')}}" title="Login">Post A Creative's Job</a></li>
                @endif
                <li><a href="#">Find Creative Teams</a></li>
                <div class="m-footer">
                  <li>
                    <hr/>
                    <a href="https://www.facebook.com/pixelcounsel" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                  <a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                  <a href="https://twitter.com/pixelcounsel" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                  <a href="https://www.linkedin.com/in/pixel-counsel-14358a16/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                </div>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
<!-- Page Header -->
 {{$slot}}
    <!-- Footer -->
    <footer class="footer-bs-light">
      @livewire('newsletter-component')
      <hr>
      <div class="container">
        <div class="row">
        	<div class="col-md-3 col-sm-12 footer-brand animated fadeInDown">
            	<a class="pull-left footer-brands" href="{{ url('/') }}"><img src="{{asset('assets/uploads/img/PC footer.svg')}}" class="img-responsive" alt="{{ config('app.name', 'pixelcounsel') }}"> </a>
                
            </div>
            {{--<div class="col-md-3 footer-brand md animated fadeInLeft">
              <p style="margin-top: 5px !important;">pixelcounsel a community of designers by designers in africa sharing resources and information</p>
              <p><?php echo date("Y");?> Pixelcounsel. All logos ?? their respective owners</p>
              </div> 
            <div class="col-md-2  footer-nav animated fadeInUp">
                  <ul class="list h-100">
                      <li><a href="#">Contact</a></li>
                      <li><a href="#">Terms</a></li>
                      <li><a href="#">Privacy Policy</a></li>
                      <li><a href="#">Shop</a></li>
                  </ul>
              </div> --}}
        <div class="col-md-2 footer-nav animated fadeInDown">
            <ul class="list h-100 mt-10">
              <li>
                <a href="/vector">VECTOR LOGOS
                  <span class="{{ (request()->is('vector*')) ? 'vector-arrows' : '' }}"></span>
                </a>
              </li>
              <li>
                <a href="/hookup">HOOKUP
                  <span class="{{ (request()->is('hookup*')) ? 'hookup-arrows' : '' }}"></span>
                </a>
              </li>
              <li>
                <a href="/jargon">JARGON BUSTER
                  <span class="{{ (request()->is('jargon*')) ? 'jargon-arrows' : '' }}"></span>
                </a>
              </li>
              <li>
                <a href="/events">EVENTS
                  <span class="{{ (request()->is('events*')) ? 'events-arrows' : '' }}"></span>
                </a>
              </li>
              </ul>
          </div>
          <div class="col-md-3 footer-nav animated fadeInDown">
            <ul class="list h-100 mt-9">
                <li><a href="#">Advertise</a></li>
                <li><a href="/hookup">Find A Creative's Job</a></li>
                @if (Auth::check())
                <li><a href="{{route('hookup.addhookup')}}">Post A Creative's Job</a></li>
                @else
                <li><a href="{{route('login')}}" title="Login">Post A Creative's Job</a></li>
                @endif
                <li><a href="#">Find Creative Teams</a></li>
               {{--<h4>Newsletter</h4>
                <p>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your email">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                    </span>
                  </div><!-- /input-group -->
               </p>--}}
                
              </ul>
          </div>
        	<div class="col-md-3 footer-ns animated fadeInRight">
                    <ul>
                      <li><a href="https://www.facebook.com/pixelcounsel" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                      <li><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                      <li><a href="https://twitter.com/pixelcounsel" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                      <li><a href="https://www.linkedin.com/in/pixel-counsel-14358a16/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                    </ul>
                 </p>
            </div>
        </div>
        <div class="row b-footer">
          <div class="col-md-8">
            <ul>
              <li><a href="/terms-of-use">Terms of use</a></li>|
              <li><a href="#">Privacy Terms</a></li>
            </ul>
            <p class="text-muted mt-0"><?php echo date("Y");?> Tradmarks and brands are the property of their respective owners.</p>
          </div>
          <div class="col-md-4">
            <div class="b-logo">
              <a href="ovakast.com"><img src="{{asset('assets/uploads/img/Ovakast-04.svg')}}" class="img-responsive" alt="ovakast"></a>
            </div>
          </div>
        </div>

      </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('assets/user/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/user/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{ asset('assets/user/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('assets/user/js/contact_me.js') }}"></script>

    <!-- Theme JavaScript -->
    <script src="{{ asset('assets/user/js/clean-blog.min.js') }}"></script>
    <!--<script src="https://cdn.tiny.cloud/1/usnjsvt7d3izvnx02koqkyq7f8ofox9rcliwz7pnsp0acn1p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->
  
   
      <script>
     /* document.addEventListener('contextmenu',(e) =>{
          e.preventDefault();
        })
         $(document).bind({
            dragenter:function(e){
              e.stopPropagation();
              e.preventDefault();
              var dt = e.originalEvent.dataTransfer;
              dt.effectAllowed = dt.dropEffect = 'none';
            },
            dragover:function (e){
              e.stopPropagation();
              e.preventDefault();
              var dt = e.originalEvent.dataTransfer;
              dt.effectAllowed = dt.dropEffect = 'none';
            }
          });*/
      //myModal
        $(window).load(function(){        
        $('#myModal').modal('show');
          }); 

          function openNav() {
            document.getElementById("myNav").style.display = "block";
            document.body.classList.toggle('lock-scroll');
          }

          function closeNav() {
            document.getElementById("myNav").style.display = "none";
          }

   
    </script>
    <style>
      .lock-scroll {
            overflow: hidden;
        }
    </style>

    @stack('scripts')

    @livewireScripts
</body>

</html>