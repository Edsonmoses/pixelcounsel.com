<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Pixel Counsel</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('assets/admin/assets/vendors/core/core.css')}}">
	<!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('assets/admin/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('assets/admin/assets/css/demo_1/style.css')}}">
  <link href="{{ asset('assets/user/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('assets/uploads/img/PCl-Fav.png')}}" />

  <script src="https://cdn.tiny.cloud/1/k8q9tgside9eky8q9awxina5c3fwpwso4mslw3530tjl39hj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <style>
    .tox:not([dir=rtl]) .tox-statusbar__branding {
            margin-left: 1ch;
            display: none !important;
        }
    </style>
  @livewireStyles
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        @if (Route::has('login'))
          @auth
              @if (Auth::user()->utype === 'ADM')
              <a href="/" class="sidebar-brand">
                  Pixel<span>Counsel</span>
              </a>
              @else
              <a href="/" class="sidebar-brand">
                Pixel<span>Counsel</span>
            </a>
          @endif
          @endauth
      @endif
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      @if (Route::has('login'))
          @auth
              @if (Auth::user()->utype === 'ADM')
                <div class="sidebar-body">
                  <ul class="nav">
                    <li class="nav-item nav-category">
                      <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                      </a>
                      <br/>
                    </li>
                    <li class="nav-item nav-category"></li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#blogs" role="button" aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Post</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="blogs">
                        <ul class="nav sub-menu">
                          <li class="nav-item">
                            <a href="{{route('admin.blog')}}" class="nav-link">All Posts</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.addblog')}}" class="nav-link">New Post</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.categories')}}" class="nav-link">Categories</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#vector" role="button" aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Vector</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="vector">
                        <ul class="nav sub-menu">
                          <li class="nav-item">
                            <a href="{{route('admin.vectorlogos')}}" class="nav-link">All Vectors</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.addvectorlogos')}}" class="nav-link">New Vector</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.vectors')}}" class="nav-link">Categories</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#events" role="button" aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Event</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="events">
                        <ul class="nav sub-menu">
                          <li class="nav-item">
                            <a href="{{route('admin.event')}}" class="nav-link">All Events</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.addevents')}}" class="nav-link">New Event</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.events')}}" class="nav-link">Categories</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.etypes')}}" class="nav-link">Event Types</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#hookups" role="button" aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Hookup</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="hookups">
                        <ul class="nav sub-menu">
                          <li class="nav-item">
                            <a href="{{route('admin.hookup')}}" class="nav-link">All Hookups</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.addhookups')}}" class="nav-link">New Hookup</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.hookups')}}" class="nav-link">Categories</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#jargon" role="button" aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Jargon</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="jargon">
                        <ul class="nav sub-menu">
                          <li class="nav-item">
                            <a href="{{route('admin.jargon')}}" class="nav-link">All Jargons</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.addjargons')}}" class="nav-link">New Jargon</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.jargons')}}" class="nav-link">Categories</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#atribute" role="button" aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Atribute</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="atribute">
                        <ul class="nav sub-menu">
                          <li class="nav-item">
                            <a href="{{route('admin.alpfilter')}}" class="nav-link">All Atributes</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.addalpfilter')}}" class="nav-link">New Atribute</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="collapse" href="#atribute" role="button" aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Ads</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                      </a>
                      <div class="collapse" id="atribute">
                        <ul class="nav sub-menu">
                          <li class="nav-item">
                            <a href="{{route('admin.ads')}}" class="nav-link">All Ads</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('admin.add_ads')}}" class="nav-link">New Ad</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </div>
                @else
                @endif
            @endauth
        @endif
    </nav>
    <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted">Sidebar:</h6>
        <div class="form-group border-bottom">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
              Light
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
              Dark
            </label>
          </div>
        </div>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item active" href="../demo_1/dashboard-one.html">
            <img src="{{ asset('assets/admin//assets/images/screenshots/light.jpg')}}" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item" href="../demo_2/dashboard-one.html">
            <img src="{{ asset('assets/admin/assets/images/screenshots/dark.jpg')}}" alt="light theme">
          </a>
        </div>
      </div>
    </nav>
    @if (Route::has('login'))
          @auth
              @if (Auth::user()->utype === 'ADM')
        <!-- partial -->
        <div class="page-wrapper">
          @else
          @endif
           <!-- partial -->
        <div class="page-wrapper" style="width: calc(100% ) !important; margin-left: 0px;">
      @endauth
      @endif
					
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar">
        <a href="#" class="sidebar-toggler">
            <i data-feather="menu"></i>
        </a>
        <div class="navbar-content">
            <form class="search-form">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i data-feather="search"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="font-weight-medium ml-1 mr-1">English</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="languageDropdown">
        <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
        <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
        <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ml-1"> German </span></a>
        <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a>
        <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
                    </div>
    </li>
                <li class="nav-item dropdown nav-apps">
                    <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="grid"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="appsDropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium">Web Apps</p>
                            <a href="javascript:;" class="text-muted">Edit</a>
                        </div>
                        <div class="dropdown-body">
                            <div class="d-flex align-items-center apps">
                                <a href="pages/apps/chat.html"><i data-feather="message-square" class="icon-lg"></i><p>Chat</p></a>
                                <a href="pages/apps/calendar.html"><i data-feather="calendar" class="icon-lg"></i><p>Calendar</p></a>
                                <a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i><p>Email</p></a>
                                <a href="pages/general/profile.html"><i data-feather="instagram" class="icon-lg"></i><p>Profile</p></a>
                            </div>
                        </div>
                        <div class="dropdown-footer d-flex align-items-center justify-content-center">
                            <a href="javascript:;">View all</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown nav-messages">
                    <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="mail"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="messageDropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium">9 New Messages</p>
                            <a href="javascript:;" class="text-muted">Clear all</a>
                        </div>
                        <div class="dropdown-body">
                            <a href="javascript:;" class="dropdown-item">
                                <div class="figure">
                                    <img src="https://via.placeholder.com/30x30" alt="userr">
                                </div>
                                <div class="content">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p>Leonardo Payne</p>
                                        <p class="sub-text text-muted">2 min ago</p>
                                    </div>	
                                    <p class="sub-text text-muted">Project status</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item">
                                <div class="figure">
                                    <img src="https://via.placeholder.com/30x30" alt="userr">
                                </div>
                                <div class="content">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p>Carl Henson</p>
                                        <p class="sub-text text-muted">30 min ago</p>
                                    </div>	
                                    <p class="sub-text text-muted">Client meeting</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item">
                                <div class="figure">
                                    <img src="https://via.placeholder.com/30x30" alt="userr">
                                </div>
                                <div class="content">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p>Jensen Combs</p>												
                                        <p class="sub-text text-muted">1 hrs ago</p>
                                    </div>	
                                    <p class="sub-text text-muted">Project updates</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item">
                                <div class="figure">
                                    <img src="https://via.placeholder.com/30x30" alt="userr">
                                </div>
                                <div class="content">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p>Amiah Burton</p>
                                        <p class="sub-text text-muted">2 hrs ago</p>
                                    </div>
                                    <p class="sub-text text-muted">Project deadline</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item">
                                <div class="figure">
                                    <img src="https://via.placeholder.com/30x30" alt="userr">
                                </div>
                                <div class="content">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p>Yaretzi Mayo</p>
                                        <p class="sub-text text-muted">5 hr ago</p>
                                    </div>
                                    <p class="sub-text text-muted">New record</p>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-footer d-flex align-items-center justify-content-center">
                            <a href="javascript:;">View all</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown nav-notifications">
                    <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell"></i>
                        <div class="indicator">
                            <div class="circle"></div>
                        </div>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium">6 New Notifications</p>
                            <a href="javascript:;" class="text-muted">Clear all</a>
                        </div>
                        <div class="dropdown-body">
                            <a href="javascript:;" class="dropdown-item">
                                <div class="icon">
                                    <i data-feather="user-plus"></i>
                                </div>
                                <div class="content">
                                    <p>New customer registered</p>
                                    <p class="sub-text text-muted">2 sec ago</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item">
                                <div class="icon">
                                    <i data-feather="gift"></i>
                                </div>
                                <div class="content">
                                    <p>New Order Recieved</p>
                                    <p class="sub-text text-muted">30 min ago</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item">
                                <div class="icon">
                                    <i data-feather="alert-circle"></i>
                                </div>
                                <div class="content">
                                    <p>Server Limit Reached!</p>
                                    <p class="sub-text text-muted">1 hrs ago</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item">
                                <div class="icon">
                                    <i data-feather="layers"></i>
                                </div>
                                <div class="content">
                                    <p>Apps are ready for update</p>
                                    <p class="sub-text text-muted">5 hrs ago</p>
                                </div>
                            </a>
                            <a href="javascript:;" class="dropdown-item">
                                <div class="icon">
                                    <i data-feather="download"></i>
                                </div>
                                <div class="content">
                                    <p>Download completed</p>
                                    <p class="sub-text text-muted">6 hrs ago</p>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-footer d-flex align-items-center justify-content-center">
                            <a href="javascript:;">View all</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown nav-profile">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://via.placeholder.com/30x30" alt="profile">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <div class="dropdown-header d-flex flex-column align-items-center">
                            <div class="figure mb-3">
                                <img src="https://via.placeholder.com/80x80" alt="">
                            </div>
                            <div class="info text-center">
                                <p class="name font-weight-bold mb-0">{{Auth::user()->name}}</p>
                                <p class="email text-muted mb-3">{{Auth::user()->email}}</p>
                            </div>
                        </div>
                        <div class="dropdown-body">
                          @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->utype === 'ADM')
                                      <ul class="profile-nav p-0 pt-3">
                                        <li class="nav-item">
                                            <a href="pages/general/profile.html" class="nav-link">
                                                <i data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                                <i data-feather="edit"></i>
                                                <span>Edit Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                                <i data-feather="repeat"></i>
                                                <span>Switch User</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('logout')}}" onclick="event.preventDefault();  document.getElementById('logout-form') .submit();" class="nav-link">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                        </li>
                                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                                          @csrf
                                        </form>
                                      </ul>
                                    @else
                                      <ul class="profile-nav p-0 pt-3">
                                        <li class="nav-item">
                                            <a href="{{route('user.profile')}}" class="nav-link">
                                                <i data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user.edit_profile')}}" class="nav-link">
                                                <i data-feather="edit"></i>
                                                <span>Edit Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                                <i data-feather="repeat"></i>
                                                <span>Switch User</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('logout')}}" onclick="event.preventDefault();  document.getElementById('logout-form') .submit();" class="nav-link">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                        </li>
                                        <form id="logout-form" method="POST" action="{{route('logout')}}">
                                          @csrf
                                        </form>
                                      </ul>
                                    @endif
                                @endauth
                            @endif
                            
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- partial -->
     {{$slot}}
   </div>
    <!-- partial:partials/_footer.html -->
    <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
        <p class="text-muted text-center text-md-left">Copyright ?? <?php echo date("Y");?> <a href="https://www.ovakast.com" target="_blank">{{ config('app.name', 'PixelCounsel') }}</a>. All rights reserved</p>
        <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
    </footer>
    <!-- partial -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('assets/admin/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{ asset('assets/admin/assets/vendors/chartjs/Chart.min.js')}}"></script>
  <script src="{{ asset('assets/admin/assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
  <script src="{{ asset('assets/admin/assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
  <script src="{{ asset('assets/admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ asset('assets/admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/admin/assets/vendors/progressbar')}}/progressbar.min.js')}}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ asset('assets/admin/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{ asset('assets/admin/assets/js/template.js')}}"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{ asset('assets/admin/assets/js/dashboard.js')}}"></script>
  <script src="{{ asset('assets/admin/assets/js/datepicker.js')}}"></script>
	<!-- end custom js for this page -->
  
  @stack('scripts')

  @livewireScripts
</body>
</html>      