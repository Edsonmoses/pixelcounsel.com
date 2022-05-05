<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>{{ Auth::user()->name }} | Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/uploads/img/PCl-Fav.png')}}">

         <!-- Plugins css -->
         <link href="{{ asset('assets/admin/assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('assets/admin/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" />
 
         <link href="{{ asset('assets/admin/assets/libs/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('assets/admin/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('assets/admin/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('assets/user/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{ asset('assets/user/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />

        <!-- App-dark css -->
        <link href="{{ asset('assets/user/assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="disabled"/>
        <link href="{{ asset('assets/user/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled="disabled"/>

        <!-- icons -->
        <link href="{{ asset('assets/user/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        @livewireStyles
        <style>
        .tox:not([dir=rtl]) .tox-statusbar__branding {
                margin-left: 1ch;
                display: none !important;
            }
        </style>
    </head>

    <!-- body start -->
    <body class="loading" data-layout='{"mode": "dark", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "dark", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- Topbar Start -->
            <div class="navbar-custom">
                    <ul class="list-unstyled topnav-menu float-end mb-0">

                        <li class="d-none d-lg-block">
                            <form class="app-search">
                                <div class="app-search-box">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search..." id="top-search">
                                        <button class="btn input-group-text" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                    <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                        <!-- item-->
                                        <div class="dropdown-header noti-title">
                                            <h5 class="text-overflow mb-2">Found 22 results</h5>
                                        </div>
            
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="fe-home me-1"></i>
                                            <span>Analytics Report</span>
                                        </a>
            
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="fe-aperture me-1"></i>
                                            <span>How can I help you?</span>
                                        </a>
                            
                                        <!-- item-->
                                        <a href="{{route('user.edit_profile')}}" class="dropdown-item notify-item">
                                            <i class="fe-settings me-1"></i>
                                            <span>User profile settings</span>
                                        </a>

                                        <!-- item-->
                                        <div class="dropdown-header noti-title">
                                            <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                        </div>

                                        <div class="notification-list">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="d-flex align-items-start">
                                                    <img class="d-flex me-2 rounded-circle" src="{{ asset('assets/user/assets/images/users/user-2.jpg')}}" alt="Generic placeholder image" height="32">
                                                    <div class="w-100">
                                                        <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                        <span class="font-12 mb-0">UI Designer</span>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="d-flex align-items-start">
                                                    <img class="d-flex me-2 rounded-circle" src="{{ asset('assets/user/assets/images/users/user-5.jpg')}}" alt="Generic placeholder image" height="32">
                                                    <div class="w-100">
                                                        <h5 class="m-0 font-14">Jacob Deo</h5>
                                                        <span class="font-12 mb-0">Developer</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
            
                                    </div> 
                                </div>
                            </form>
                        </li>
    
                        <li class="dropdown d-inline-block d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>
            
                        <li class="dropdown notification-list topbar-dropdown">
                            @livewire('user.user-notification')
                        </li>
    
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                @if (Auth::user()->profile->image) 
                                    <img src="{{asset('assets/images/profiles')}}/{{ Auth::user()->profile->image }}" alt="{{ Auth::user()->name}}" class="rounded-circle">
                                @else
                                     <img src="{{ asset('assets/images/profiles/default.jpg')}}" alt="{{ Auth::user()->name}}" class="rounded-circle">
                                @endif
                                <span class="pro-user-name ms-1">
                                  {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
    
                                <!-- item-->
                                <a href="{{ route('user.profile') }}" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>
    
                                <!-- item-->
                                <a href="auth-lock-screen.html" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a>
    
                                <div class="dropdown-divider"></div>
    
                                <!-- item-->
                                <a href="{{route('logout')}}" onclick="event.preventDefault();  document.getElementById('logout-form') .submit();" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" method="POST" action="{{route('logout')}}">
                                  @csrf
                                </form>
                            </div>
                        </li>
    
                        <li class="dropdown notification-list">
                            <a href="{{route('user.setting')}}" class="nav-link right-bar-toggle waves-effect waves-light">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li>
    
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="/" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{asset('assets/uploads/img/Pixel Counsel--09.svg')}}" alt="{{ config('app.name', 'PixelCounsel') }}" height="88">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('assets/uploads/img/Pixel Counsel--09.svg')}}" alt="{{ config('app.name', 'PixelCounsel') }}" height="60">
                            </span>
                        </a>
                        <a href="/" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{asset('assets/uploads/img/Pixel Counsel--09.svg')}}" alt="{{ config('app.name', 'PixelCounsel') }}" height="88">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('assets/uploads/img/Pixel Counsel--09.svg')}}" alt="{{ config('app.name', 'PixelCounsel') }}" height="60">
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                        <li>
                            <button class="button-menu-mobile disable-btn waves-effect">
                                <i class="fe-menu"></i>
                            </button>
                        </li>
    
                        <li>
                           <a href="{{route('user.dashboard')}}"> <h4 class="page-title-main">Dashboard</h4></a>
                        </li>
            
                    </ul>

                    <div class="clearfix"></div> 
               
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                     <!-- User box -->
                    <div class="user-box text-center">
                        @if (Auth::user()->profile->image) 
                             <img src="{{  asset('assets/images/profiles')}}/{{ Auth::user()->profile->image }}" alt="user-img" title="{{ Auth::user()->name}}" class="rounded-circle img-thumbnail avatar-md">
                        @else
                            <img src="{{ asset('assets/images/profiles/default.jpg')}}" alt="user-img" title="{{ Auth::user()->name}}" class="rounded-circle img-thumbnail avatar-md">
                        @endif
                        <div class="dropdown">
                                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false">{{Auth::user()->name}}</a>
                                <div class="dropdown-menu user-pro-dropdown">

                                    <!-- item-->
                                    <a href="{{ route('user.profile') }}" class="dropdown-item notify-item">
                                        <i class="fe-user me-1"></i>
                                        <span>My Account</span>
                                    </a>
        
                                    <!-- item-->
                                    <a href="{{route('user.setting')}}" class="dropdown-item notify-item">
                                        <i class="fe-settings me-1"></i>
                                        <span>Settings</span>
                                    </a>
        
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-lock me-1"></i>
                                        <span>Lock Screen</span>
                                    </a>
        
                                    <!-- item-->
                                    <a href="{{route('logout')}}" onclick="event.preventDefault();  document.getElementById('logout-form') .submit();" class="dropdown-item notify-item">
                                        <i class="fe-log-out me-1"></i>
                                        <span>Logout</span>
                                    </a>
                                    <form id="logout-form" method="POST" action="{{route('logout')}}">
                                      @csrf
                                    </form>
                                </div>
                            </div>

                        <p class="text-muted left-user-info">Admin Head</p>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{route('user.setting')}}" class="text-muted left-user-info">
                                    <i class="mdi mdi-cog"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="{{route('logout')}}" onclick="event.preventDefault();  document.getElementById('logout-form') .submit();">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Navigation</li>
                
                            <li>
                                <a href="{{route('user.dashboard')}}">
                                    <i class="mdi mdi-view-dashboard-outline"></i>
                                    <span class="badge bg-success rounded-pill float-end">9+</span>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="#vectors" data-bs-toggle="collapse">
                                    <i class="fa fa-vector-square"></i>
                                    <span> Vectors </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="vectors">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('user.vectors')}}">All Vectors</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.vecadd')}}">Add vector</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.vecedits')}}">Edit Vector</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#hookups" data-bs-toggle="collapse">
                                    <i class="fa fa-tasks"></i>
                                    <span> Hookup </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="hookups">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('user.hookups')}}">All Hookups</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.hookadd')}}">Add Hookup</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.hookedits')}}">Edit Hookup</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#events" data-bs-toggle="collapse">
                                    <i class="fa fa-calendar-check"></i>
                                    <span> Events </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="events">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('user.events')}}">All Events</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.evadd')}}">Add Event</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.evedits')}}">Edit Event</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('user.profile') }}">
                                    <i class="fe-user me-1"></i>
                                    <span> My Account </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.edit_profile') }}">
                                    <i class="fe-user me-1"></i>
                                    <span> Edit Profile </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.setting') }}">
                                    <i class="fe-lock me-1"></i>
                                    <span> Current Password </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.2faenable') }}">
                                    <i class="fa fa-key me-1"></i>
                                    <span> 2fa enable </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.daccount') }}">
                                    <i class="fe-trash me-1"></i>
                                    <span> Delete Account </span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            {{$slot}}

                <!-- Footer Start -->
                <footer class="footer">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-6">
                            <script>document.write(new Date().getFullYear())</script> &copy; Pixel Counsel by <a href="https://ovakast.com/">ovakast</a> 
                          </div>
                          <div class="col-md-6">
                              <div class="text-md-end footer-links d-none d-sm-block">
                                  <a href="javascript:void(0);">About Us</a>
                                  <a href="javascript:void(0);">Help</a>
                                  <a href="javascript:void(0);">Contact Us</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </footer>
              <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        {{-- <div class="right-bar">

            <div data-simplebar class="h-100">

                <div class="rightbar-title">
                    <a href="javascript:void(0);" class="right-bar-toggle float-end">
                        <i class="mdi mdi-close"></i>
                    </a>
                    <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
                </div>
        
                <!-- Tab panes -->
                <div class="tab-content pt-0">  

                    <div class="tab-pane active" id="settings-tab" role="tabpanel">

                        <div class="p-3">
                            <div class="alert alert-warning" role="alert">
                                <strong>Customize </strong> the overall color scheme, Layout, etc.
                            </div>

                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light"
                                    id="light-mode-check"/>
                                <label class="form-check-label" for="light-mode-check">Light Mode</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark"
                                    id="dark-mode-check" checked />
                                <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                            </div>

                            <!-- Width -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="width" value="fluid" id="fluid-check" checked />
                                <label class="form-check-label" for="fluid-check">Fluid</label>
                            </div>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="width" value="boxed" id="boxed-check" />
                                <label class="form-check-label" for="boxed-check">Boxed</label>
                            </div>

                            <!-- Menu positions -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="menus-position" value="fixed" id="fixed-check"
                                    checked />
                                <label class="form-check-label" for="fixed-check">Fixed</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="menus-position" value="scrollable"
                                    id="scrollable-check" />
                                <label class="form-check-label" for="scrollable-check">Scrollable</label>
                            </div>

                            <!-- Left Sidebar-->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="light" id="light-check" />
                                <label class="form-check-label" for="light-check">Light</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="dark" id="dark-check" checked/>
                                <label class="form-check-label" for="dark-check">Dark</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="brand" id="brand-check" />
                                <label class="form-check-label" for="brand-check">Brand</label>
                            </div>

                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="gradient" id="gradient-check" />
                                <label class="form-check-label" for="gradient-check">Gradient</label>
                            </div>

                            <!-- size -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="default"
                                    id="default-size-check" checked />
                                <label class="form-check-label" for="default-size-check">Default</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="condensed"
                                    id="condensed-check" />
                                <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small size)</small></label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="compact"
                                    id="compact-check" />
                                <label class="form-check-label" for="compact-check">Compact <small>(Small size)</small></label>
                            </div>

                            <!-- User info -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-user" value="fixed" id="sidebaruser-check" />
                                <label class="form-check-label" for="sidebaruser-check">Enable</label>
                            </div>


                            <!-- Topbar -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="topbar-color" value="dark" id="darktopbar-check"
                                    checked />
                                <label class="form-check-label" for="darktopbar-check">Dark</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="topbar-color" value="light" id="lighttopbar-check" />
                                <label class="form-check-label" for="lighttopbar-check">Light</label>
                            </div>

                            <div class="d-grid mt-4">
                                <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                                <a href="https://1.envato.market/admintoadmin" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                            </div>

                        </div>

                    </div>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>--}}
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
       {{-- <div class="rightbar-overlay"></div>--}}

        <!-- Vendor -->
        <script src="{{ asset('assets/user/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/user/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/user/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('assets/user/assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{ asset('assets/user/assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('assets/user/assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{ asset('assets/user/assets/libs/feather-icons/feather.min.js')}}"></script>

        <!-- knob plugin -->
        <script src="{{ asset('assets/user/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <script src="{{ asset('assets/user/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
        <script src="{{ asset('assets/user/assets/libs/dropzone/min/dropzone.min.js')}}"></script>
        <script src="{{ asset('assets/user/assets/libs/multiselect/js/jquery.multi-select.js')}}"></script>
        <script src="{{ asset('assets/user/assets/libs/select2/js/select2.min.js')}}"></script>

        <!--Morris Chart-->
        <script src="{{ asset('assets/user/assets/libs/morris.js06/morris.min.js')}}"></script>
        <script src="{{ asset('assets/user/assets/libs/raphael/raphael.min.js')}}"></script>
  
        <!-- Dashboar init js-->
        <script src="{{ asset('assets/user/assets/js/pages/dashboard.init.js')}}"></script>

        <!-- App js-->
        <script src="{{ asset('assets/user/assets/js/app.min.js')}}"></script>
        <script>
            var modalVerticalCenterClass = ".modal";

            function centerModals($element) {
                var $modals;
                if ($element.length) {
                $modals = $element;
                } else {
                $modals = $(modalVerticalCenterClass + ':visible');
            }
            $modals.each( function(i) {
                var $clone = $(this).clone().css('display', 'block').appendTo('body');
                var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
                top = top > 0 ? top : 0;
                $clone.remove();
                $(this).find('.modal-content').css("margin-top", top);
                });
            }
            $(modalVerticalCenterClass).on('show.bs.modal', function(e) {
                centerModals($(this));
            });
            $(window).on('resize', centerModals);

            $('#updated-form').submit(function (e) {
              $('#exampleModalLong').modal('show');
              return false;
          });
        </script>
        <style>
            /**successful submition popup**/
            .popups .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #333 !important;
            background-clip: padding-box;
            border: 1px solid transparent;
            border-radius: 1.2rem !important;
            outline: 0;
            }
            .popups .modal-content h1{
                font-size: 4.25rem;
            }
            .popups .modal-content p{
                margin-bottom: 3rem;
                font-size: 1.75rem;
            }
            .popups .modal-header .close {
                margin: 0;
                position: absolute;
                top: -7px;
                right: -26px;
                width: 23px;
                height: 23px;
                border-radius: 23px;
                background-color: transparent;
                color: #222;
                font-size: 35px;
                opacity: 1;
                z-index: 10;
                text-align: center;
            } 
            .popups .modal-header{
                border-bottom: 1px solid #333 !important;
            }
            .popups .btn-successfully{
                width: 110px;
                height: 110px;
                background: #fff100;
                border-radius: 55px;
                color: #222 !important;
                font-size: 17px;
                text-transform: uppercase;
                line-height: 1.2em;
            }
            .popups .btn-successfully i{
                font-size: 41px;
                -webkit-text-stroke: 2px #fff100;
            }
            .popups .popup_logo{
                width: 80px !important;
                margin-top: 3em;
                margin-bottom: 2em;
            }
            .modal-backdrop.show {
            background-color: #fff;
            opacity: 0.95;
            }
            nav .hidden {
            display: none !important;
            }
        </style>
        @livewireScripts
    </body>
</html>
