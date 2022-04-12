<div>
    <div class="hookup-actives"><div class="hookup-arrows"></div></div>
   <header class="intro-header intro-hookup">
    <div class="container">
        <div class="row hookup">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <div class="heading-style">
                    <h1>HOOK UP</h1>
                    <span class="sub-heading">Collection of career changing jobs in Africa for your picking</span>
                </div>
                @if (Auth::check())
                <div class="hook-searchs hidden-md hidden-lg">
                    <a class="btn btn-events" href="{{ route('hookup.addhookup') }}" role="button" style="margin-top: -43px;">SUBMIT A JOB</a>
                </div>
                @else
                <div class="hook-searchs hidden-md hidden-lg">
                    <a class="btn btn-events" href="{{route('login')}}" title="Login" role="button" style="margin-top: -43px;">SUBMIT A JOB</a>
                </div>
                @endif
                <div style="clear: both"></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 hook-search heading-mt">
                @if (Auth::check())
                <div class="hook-searchs hidden-xs hidden-sm">
                    <a class="btn btn-events" href="{{ route('hookup.addhookup') }}" role="button" style="margin-top: -43px;">SUBMIT A JOB</a>
                </div>
                @else
                <div class="hook-searchs hidden-xs hidden-sm">
                    <a class="btn btn-events" href="{{route('login')}}" title="Login" role="button" style="margin-top: -43px;">SUBMIT A JOB</a>
                </div>
                @endif
                <div id="custom-search-input">
                    <div class="input-group col-md-12 col-sm-12">
                        <input type="text" class="search-query form-control" placeholder="Find a job"  wire:model="searchTerm"/>
                        <span class="input-group-btn">
                            <button class="btn btn-danger" name="hasCoffeeMachine" type="button">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
                </div>
        </div>
        </div>
    </div>
    </header>
	<!-- Main Content -->
	<div class="container">
	    <div class="row" id="hookup">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <ul class="nav nav-pills nav nav-pills rounded nav-justified flex-column flex-sm-row" id="pills-tab" role="tablist">
            <li class="active rounded"><a data-toggle="pill" id="recent-job-tab" href="#recent-job" role="tab" aria-controls="recent-job">Recent Jobs</a></li>
            <li><a data-toggle="pill" href="#featured-job" role="tab" aria-controls="featured-job">Featured Jobs</a></li>
            <li><a data-toggle="pill" href="#part-job" role="tab" aria-controls="part-job">Part Time</a></li>
            <li><a data-toggle="pill" href="#full-job" role="tab" aria-controls="full-job">Full Time</a></li>
          </ul>
          
          <div class="tab-content">
              <!--recent job-->
            <div id="recent-job" class="tab-pane fade in active tab-pane" role="tabpanel" aria-labelledby="recent-job-tab">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($hookups as $hookup)
                        @if ($hookup->open <= now())
                       
                        @else
                        <a href="{{ route('hookup.details',['hookup_slug'=>$hookup->slug]) }}" class="text-primary">
                            <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                <a href="{{ route('hookup.details',['hookup_slug'=>$hookup->slug]) }}">
                                <div class="lable text-center pt-2 pb-2">
                                    <ul class="list-unstyled best text-white mb-0 text-uppercase">
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                </a>
                               
                                <div class="p-4">
                                    <a href="{{ route('hookup.details',['hookup_slug'=>$hookup->slug]) }}">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="mo-mb-2">
                                                    <img src="{{ asset('assets/images/hookups') }}/{{$hookup->images}}" alt="{{$hookup->jobtitle}}" class="img-fluid mx-auto d-block jobimg" width="84" height="84">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <h5 class="f-18" style="margin-bottom: -25px"><a href="{{ route('hookup.details',['hookup_slug'=>$hookup->slug]) }}" class="text-dark">{{$hookup->name}}</a></h5>
                                                <p class="text-muted mb-0">{{$hookup->company}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$hookup->location}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <p class="text-muted mb-0">{{$hookup->schedule}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                
                                <a href="{{ route('hookup.details',['hookup_slug'=>$hookup->slug]) }}">
                                <div class="p-3 bg-light">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-2">
                                            <div>
                                                <p class="text-muted experience"><span class="text-dark">Experience :</span> {{$hookup->experience}}</p>
                                            </div>
                                        </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="timers">
                                            <svg class="days hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#00B55E" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                            <svg  class="msmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                            <div id="trip_{{ $hookup->open }}" class="days hide"></div>
                                            <div id="trip_{{ $hookup->open }}" class="msmalltext hide"></div>
                                        </div>
                                    </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 applyN">
                                            <div class="mt-4">
                                                <a href="{{ route('hookup.details',['hookup_slug'=>$hookup->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </a>
                        @endif
                    @endforeach
                    <script>
                        function TimeRemaining(){
                            var els = document.querySelectorAll('[id^="trip_"]');
                            for (var i=0; i<els.length; i++) {
                                var el_id = els[i].getAttribute('id');
                                var end_time = el_id.split('_')[1];
                                var deadline = new Date(end_time);
                                var now = new Date();
                                var t = Math.floor(deadline.getTime() - now.getTime());
                                var days = Math.floor(t / (1000 * 60 * 60 * 24));
                                var hours = Math.floor((t % (1000 * 60 * 60 * 24))/(1000 * 60 * 60));
                                var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds = Math.floor((t % (1000 * 60)) / 1000);
                                if (t < 0) {
                                    document.getElementById("trip_" + end_time).innerHTML = 'EXPIRED';
                                }else if(days < 0){
                                    document.getElementById("trip_" + end_time).innerHTML = minutes + " minutes remaining ";
                                    $(".msmalltext").removeClass("hide");
                                }else if(minutes < 0){
                                    document.getElementById("trip_" + end_time).innerHTML = seconds + " closing today ";
                                    $(".msmalltext").removeClass("hide");
                                }else if(days > 0){
                                    document.getElementById("trip_" + end_time).innerHTML = days + " days remaining";
                                    $(".days").removeClass("hide");
                                    //document.getElementById("trip_" + end_time).innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
                                }
                            }
                            }
                    
                            function StartTimeRemaining(){
                                TimeRemaining();
                                setInterval(function(){
                                    TimeRemaining();
                                }, 1000)
                            }
                    
                    
                            StartTimeRemaining();
                        </script>
                    </div>
                </div>
            </div>
            <!--featured job-->
            <div id="featured-job" class="tab-pane fade" role="tabpanel" aria-labelledby="featured-job-tab">
                <div id="recent-job" class="tab-pane fade in active tab-pane" role="tabpanel" aria-labelledby="recent-job-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach ($hookups as $featured)
                                @if ($featured->open <= now())
                                
                                    @else
                                        @if ($featured->featured == 1)
                                            <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                                <div class="lable text-center pt-2 pb-2">
                                                    <ul class="list-unstyled best text-white mb-0 text-uppercase">
                                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="p-4">
                                                    <div class="row align-items-center">
                                                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                            <div class="mo-mb-2">
                                                                    <img src="{{ asset('assets/images/hookups') }}/{{$featured->images}}" alt="{{$featured->name}}" class="img-fluid mx-auto d-block jobimg" width="84" height="84">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                                            <div>
                                                                <h5 class="f-18" style="margin-bottom: -25px"><a href="{{ route('hookup.details',['hookup_slug'=>$featured->slug]) }}" class="text-dark">{{$featured->name}}</a></h5>
                                                                <p class="text-muted mb-0">{{$featured->company}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                            <div>
                                                                <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$featured->location}}</p>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-md-2">
                                                            <div>
                                                                <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">$</span>{{$hookup->price}}</p>
                                                            </div>
                                                        </div>--}}
                                                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                            <div>
                                                                <p class="text-muted mb-0">{{$featured->schedule}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="p-3 bg-light">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-2">
                                                            <div>
                                                                <p class="text-muted" style="margin:10px 0 10px 0"><span class="text-dark">Experience :</span> {{$featured->experience}}</p>
                                                            </div>
                                                        </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                        <div class="timers">
                                                            <svg class="days hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#00B55E" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                            <svg  class="msmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                            <div id="ftrip_{{ $featured->open }}" class="days hide"></div>
                                                            <div id="ftrip_{{ $featured->open }}" class="msmalltext hide"></div>
                                                        </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 applyN">
                                                            <div class="mt-4">
                                                                <a href="{{ route('hookup.details',['hookup_slug'=>$featured->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                                <script>
                                    function TimeRemaining(){
                                        var els = document.querySelectorAll('[id^="tfrip_"]');
                                        for (var i=0; i<els.length; i++) {
                                            var el_id = els[i].getAttribute('id');
                                            var end_time = el_id.split('_')[1];
                                            var deadline = new Date(end_time);
                                            var now = new Date();
                                            var t = Math.floor(deadline.getTime() - now.getTime());
                                            var days = Math.floor(t / (1000 * 60 * 60 * 24));
                                            var hours = Math.floor((t % (1000 * 60 * 60 * 24))/(1000 * 60 * 60));
                                            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
                                            var seconds = Math.floor((t % (1000 * 60)) / 1000);
                                            if (t < 0) {
                                                document.getElementById("ftrip_" + end_time).innerHTML = 'EXPIRED';
                                            }else if(days < 0){
                                                document.getElementById("ftrip_" + end_time).innerHTML = minutes + " minutes remaining ";
                                                $(".msmalltext").removeClass("hide");
                                            }else if(minutes < 0){
                                                document.getElementById("ftrip_" + end_time).innerHTML = seconds + " closing today ";
                                                $(".msmalltext").removeClass("hide");
                                            }else if(days > 0){
                                                document.getElementById("ftrip_" + end_time).innerHTML = days + " days remaining";
                                                $(".days").removeClass("hide");
                                                //document.getElementById("ftrip_" + end_time).innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
                                            }
                                        }
                                        }
                                
                                        function StartTimeRemaining(){
                                            TimeRemaining();
                                            setInterval(function(){
                                                TimeRemaining();
                                            }, 1000)
                                        }
                                
                                
                                        StartTimeRemaining();
                                    </script>
                        </div>
                    </div>
                </div>
            </div>
            <!--parttime job-->
            <div id="part-job" class="tab-pane fade" role="tabpanel" aria-labelledby="part-job-tab">
                <div id="recent-job" class="tab-pane fade in active tab-pane" role="tabpanel" aria-labelledby="recent-job-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach ($hookups as $parttime)
                                @if ($parttime->open <= now())
                                @else
                                    @if ($parttime->fjob == 'Part Time')
                                        <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                            <div class="lable text-center pt-2 pb-2">
                                                <ul class="list-unstyled best text-white mb-0 text-uppercase">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="p-4">
                                                <div class="row align-items-center">
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                        <div class="mo-mb-2">
                                                                <img src="{{ asset('assets/images/hookups') }}/{{$parttime->images}}" alt="{{$parttime->name}}" class="img-fluid mx-auto d-block jobimg" width="84" height="84">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                                        <div>
                                                            <h5 class="f-18" style="margin-bottom: -25px"><a href="{{ route('hookup.details',['hookup_slug'=>$parttime->slug]) }}" class="text-dark">{{$parttime->name}}</a></h5>
                                                            <p class="text-muted mb-0">{{$parttime->company}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                        <div>
                                                            <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$parttime->location}}</p>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-2">
                                                        <div>
                                                            <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">$</span>{{$hookup->price}}</p>
                                                        </div>
                                                    </div>--}}
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                        <div>
                                                            <p class="text-muted mb-0">{{$parttime->schedule}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="p-3 bg-light">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-2">
                                                        <div>
                                                            <p class="text-muted" style="margin:10px 0 10px 0"><span class="text-dark">Experience :</span> {{$parttime->experience}}</p>
                                                        </div>
                                                    </div>
                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                    <div class="timers">
                                                        <svg class="days hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#00B55E" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                        <svg  class="msmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                        <div id="ptrip_{{ $parttime->open }}" class="days hide"></div>
                                                        <div id="ptrip_{{ $parttime->open }}" class="msmalltext hide"></div>
                                                    </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 applyN">
                                                        <div class="mt-4">
                                                            <a href="{{ route('hookup.details',['hookup_slug'=>$parttime->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                            <script>
                                function TimeRemaining(){
                                    var els = document.querySelectorAll('[id^="ptrip_"]');
                                    for (var i=0; i<els.length; i++) {
                                        var el_id = els[i].getAttribute('id');
                                        var end_time = el_id.split('_')[1];
                                        var deadline = new Date(end_time);
                                        var now = new Date();
                                        var t = Math.floor(deadline.getTime() - now.getTime());
                                        var days = Math.floor(t / (1000 * 60 * 60 * 24));
                                        var hours = Math.floor((t % (1000 * 60 * 60 * 24))/(1000 * 60 * 60));
                                        var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((t % (1000 * 60)) / 1000);
                                        if (t < 0) {
                                            document.getElementById("ptrip_" + end_time).innerHTML = 'EXPIRED';
                                        }else if(days < 0){
                                            document.getElementById("ptrip_" + end_time).innerHTML = minutes + " minutes remaining ";
                                            $(".msmalltext").removeClass("hide");
                                        }else if(minutes < 0){
                                            document.getElementById("ptrip_" + end_time).innerHTML = seconds + " closing today ";
                                            $(".msmalltext").removeClass("hide");
                                        }else if(days > 0){
                                            document.getElementById("ptrip_" + end_time).innerHTML = days + " days remaining";
                                            $(".days").removeClass("hide");
                                            //document.getElementById("trip_" + end_time).innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
                                        }
                                    }
                                    }
                            
                                    function StartTimeRemaining(){
                                        TimeRemaining();
                                        setInterval(function(){
                                            TimeRemaining();
                                        }, 1000)
                                    }
                            
                            
                                    StartTimeRemaining();
                                </script>
                        </div>
                    </div>
                </div>
            </div>
            <!--fulltime job-->
            <div id="full-job" class="tab-pane fade" role="tabpanel" aria-labelledby="full-job-tab">
                <div id="recent-job" class="tab-pane fade in active tab-pane" role="tabpanel" aria-labelledby="recent-job-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach ($hookups as $fulltime)
                                @if ($fulltime->open <= now())
                                @else
                                    @if ($parttime->fjob == 'Full Time')
                                        <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                            <div class="lable text-center pt-2 pb-2">
                                                <ul class="list-unstyled best text-white mb-0 text-uppercase">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="p-4">
                                                <div class="row align-items-center">
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                        <div class="mo-mb-2">
                                                                <img src="{{ asset('assets/images/hookups') }}/{{$fulltime->images}}" alt="{{$fulltime->name}}" class="img-fluid mx-auto d-block jobimg" width="84" height="84">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                                        <div>
                                                            <h5 class="f-18" style="margin-bottom: -25px"><a href="{{ route('hookup.details',['hookup_slug'=>$fulltime->slug]) }}" class="text-dark">{{$fulltime->name}}</a></h5>
                                                            <p class="text-muted mb-0">{{$fulltime->company}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                        <div>
                                                            <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$fulltime->location}}</p>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-2">
                                                        <div>
                                                            <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">$</span>{{$hookup->price}}</p>
                                                        </div>
                                                    </div>--}}
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                        <div>
                                                            <p class="text-muted mb-0">{{$fulltime->schedule}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="p-3 bg-light">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-2">
                                                        <div>
                                                            <p class="text-muted" style="margin:10px 0 10px 0"><span class="text-dark">Experience :</span> {{$fulltime->experience}}</p>
                                                        </div>
                                                    </div>
                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                    <div class="timers">
                                                        <svg class="days hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#00B55E" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                        <svg  class="msmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                        <div id="fltrip_{{ $fulltime->open }}" class="days hide"></div>
                                                        <div id="fltrip_{{ $fulltime->open }}" class="msmalltext hide"></div>
                                                    </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 applyN">
                                                        <div class="mt-4">
                                                            <a href="{{ route('hookup.details',['hookup_slug'=>$fulltime->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                            <script>
                                function TimeRemaining(){
                                    var els = document.querySelectorAll('[id^="fltrip_"]');
                                    for (var i=0; i<els.length; i++) {
                                        var el_id = els[i].getAttribute('id');
                                        var end_time = el_id.split('_')[1];
                                        var deadline = new Date(end_time);
                                        var now = new Date();
                                        var t = Math.floor(deadline.getTime() - now.getTime());
                                        var days = Math.floor(t / (1000 * 60 * 60 * 24));
                                        var hours = Math.floor((t % (1000 * 60 * 60 * 24))/(1000 * 60 * 60));
                                        var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((t % (1000 * 60)) / 1000);
                                        if (t < 0) {
                                            document.getElementById("fltrip_" + end_time).innerHTML = 'EXPIRED';
                                        }else if(days < 0){
                                            document.getElementById("fltrip_" + end_time).innerHTML = minutes + " minutes remaining ";
                                            $(".msmalltext").removeClass("hide");
                                        }else if(minutes < 0){
                                            document.getElementById("fltrip_" + end_time).innerHTML = seconds + " closing today ";
                                            $(".msmalltext").removeClass("hide");
                                        }else if(days > 0){
                                            document.getElementById("fltrip_" + end_time).innerHTML = days + " days remaining";
                                            $(".days").removeClass("hide");
                                            //document.getElementById("fltrip_" + end_time).innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
                                        }
                                    }
                                    }
                            
                                    function StartTimeRemaining(){
                                        TimeRemaining();
                                        setInterval(function(){
                                            TimeRemaining();
                                        }, 1000)
                                    }
                            
                            
                                    StartTimeRemaining();
                                </script>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        </div>
	    </div>
  </div>
  <div style="height: 50px"></div>
</div>
