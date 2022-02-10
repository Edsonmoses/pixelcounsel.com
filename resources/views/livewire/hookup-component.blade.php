<div>
    <div class="hookup-actives"><div class="hookup-arrows"></div></div>
   <header class="intro-header intro-hookup">
    <div class="container">
        <div class="row hookup">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="heading-style">
                    <h1>HOOK UP</h1>
                    <span class="sub-heading">Collection of career changing jobs in Africa for your picking</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 hook-search heading-mt">
                @if (Auth::check())
                <div class="hook-searchs">
                    <a class="btn btn-events" href="{{ route('hookup.addhookup') }}" role="button" style="margin-top: -43px;">SUBMIT A JOB</a>
                </div>
                @else
                <div class="hook-searchs">
                    <a class="btn btn-events" href="{{route('login')}}" title="Login" role="button" style="margin-top: -43px;">SUBMIT A JOB</a>
                </div>
                @endif
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="  search-query form-control" placeholder="Find a job"  wire:model="searchTerm"/>
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button">
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
            <div id="recent-job" class="tab-pane fade in active tab-pane" role="tabpanel" aria-labelledby="recent-job-tab">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($hookups as $hookup)
                        @if ($hookup->open <= now())
                       
                        @else
                        <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                            <div class="lable text-center pt-2 pb-2">
                                <ul class="list-unstyled best text-white mb-0 text-uppercase">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <div class="mo-mb-2">
                                                <img src="{{ asset('assets/images/hookups') }}/{{$hookup->images}}" alt="{{$hookup->jobtitle}}" class="img-fluid mx-auto d-block" width="84" height="84">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>
                                            <h5 class="f-18" style="margin-bottom: -25px"><a href="{{ route('hookup.details',['hookup_slug'=>$hookup->slug]) }}" class="text-dark">{{$hookup->name}}</a></h5>
                                            <p class="text-muted mb-0">{{$hookup->company}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$hookup->location}}</p>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <div>
                                            <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">$</span>{{$hookup->price}}</p>
                                        </div>
                                    </div>--}}
                                    <div class="col-md-2">
                                        <div>
                                            <p class="text-muted mb-0">{{$hookup->schedule}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-3 bg-light">
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-2">
                                        <div>
                                            <p class="text-muted" style="margin:10px 0 10px 0"><span class="text-dark">Experience :</span> {{$hookup->experience}}</p>
                                        </div>
                                    </div>
                                   <div class="col-md-4">
                                    <div id="clockdiv">
                                        <input type="hidden" id="jobopen" value="{{ $hookup->open }}">
                                        <div class="timers">
                                                <svg class="days hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#00B55E" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                <span class="dsmalltext hide" id="day"></span>
                                                <div class="dsmalltext hide">days remaining</div>
                                            </div> 
                                        
                                          <div>
                                            <span class="hours" id="hour" style="display: none !important"></span>
                                            <div class="hsmalltext" style="display: none !important">Hours</div>
                                          </div>
                                          <div class="timers">
                                            <svg class="msmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                            <span class="minutes hide" id="minute"></span>
                                            <div class="msmalltext hide">minutes remaining</div>
                                          </div>
                                            <div class="timers">
                                                <svg  class="ssmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                <span class="seconds hide" id="second"></span>
                                                <div class="ssmalltext hide">closing today</div>
                                            </div>
                                    </div>
                                            <div class="timers">
                                                <p id="demo"></p>
                                            </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mt-4">
                                            <a href="{{ route('hookup.details',['hookup_slug'=>$hookup->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <script>
                            //var open = @php echo strtotime($hookup->open ) @endphp;
                            var jobopen = $('#jobopen').val();
                            console.log(jobopen);
                            var deadline = new Date(jobopen).getTime();

                            var x = setInterval(function() {
                              
                            var now = new Date().getTime();
                            var t = deadline - now;
                            var days = Math.floor(t / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
                            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((t % (1000 * 60)) / 1000);
                            document.getElementById("day").innerHTML =days ;
                            document.getElementById("hour").innerHTML =hours;
                            document.getElementById("minute").innerHTML = minutes; 
                            document.getElementById("second").innerHTML =seconds; 
                            if (t < 0) {
                                    clearInterval(x);
                                    document.getElementById("demo").innerHTML = "Closed";
                                    document.getElementById("day").innerHTML ='0';
                                    document.getElementById("hour").innerHTML ='0';
                                    document.getElementById("minute").innerHTML ='0' ; 
                                    document.getElementById("second").innerHTML = '0'; }
                            if(days <= 0)
                            {
                                $("#day").hide();
                                $(".dsmalltext").hide();
                                $("#minute").show();
                                $(".msmalltext").show();
                                $("#minute").removeClass("hide");
                                $(".msmalltext").removeClass("hide");
                            }
                            if(days > 0)
                            {
                                $("#minute").hide();
                                $(".msmalltext").hide();
                                $("#day").removeClass("hide");
                                $(".dsmalltext").removeClass("hide");
                            }
                            if(minutes <= 0)
                            {
                                $("#minute").hide();
                                $(".msmalltext").hide();
                                $("#second").show();
                                $(".ssmalltext").show();
                                $("#second").removeClass("hide");
                                $(".ssmalltext").removeClass("hide");
                                
                            }
                            if(minutes > 0)
                            {
                                $("#second").hide();
                                $(".ssmalltext").hide();
                            }
                            if(seconds <= 0)
                            {
                                $("#second").hide();
                                $(".ssmalltext").hide();
                            }
                            if(hours <= 0 && hours >= 0 )
                            {
                                $("#hour").hide();
                                $(".hsmalltext").hide();
                            }
                            }, 
                            1000
                            );
                            </script>
                        @endforeach

                    </div>
                </div>
            </div>
            <div id="featured-job" class="tab-pane fade" role="tabpanel" aria-labelledby="featured-job-tab">
                <div id="recent-job" class="tab-pane fade in active tab-pane" role="tabpanel" aria-labelledby="recent-job-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach ($f_hookups as $featured)
                            @if ($featured->open <= now())
                       
                        @else
                        <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                            <div class="lable text-center pt-2 pb-2">
                                <ul class="list-unstyled best text-white mb-0 text-uppercase">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <div class="mo-mb-2">
                                                <img src="{{ asset('assets/images/hookups') }}/{{$featured->images}}" alt="{{$featured->jobtitle}}" class="img-fluid mx-auto d-block" width="84" height="84">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>
                                            <h5 class="f-18" style="margin-bottom: -25px"><a href="{{ route('hookup.details',['hookup_slug'=>$featured->slug]) }}" class="text-dark">{{$featured->jobtitle}}</a></h5>
                                            <p class="text-muted mb-0">{{$featured->company}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$featured->location}}</p>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <div>
                                            <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">$</span>{{$hookup->price}}</p>
                                        </div>
                                    </div>--}}
                                    <div class="col-md-2">
                                        <div>
                                            <p class="text-muted mb-0">{{$featured->schedule}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-3 bg-light">
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-2">
                                        <div>
                                            <p class="text-muted" style="margin:10px 0 10px 0"><span class="text-dark">Experience :</span> {{$featured->experience}}</p>
                                        </div>
                                    </div>
                                   <div class="col-md-4">
                                    <div id="clockdiv">
                                        <input type="hidden" id="jobopen" value="{{ $featured->open }}">
                                        <div class="timers">
                                                <svg class="days hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#00B55E" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                <span class="dsmalltext hide" id="fday"></span>
                                                <div class="dsmalltext hide">days remaining</div>
                                            </div> 
                                        
                                          <div>
                                            <span class="hours" id="fhour" style="display: none !important"></span>
                                            <div class="hsmalltext" style="display: none !important">Hours</div>
                                          </div>
                                          <div class="timers">
                                            <svg class="msmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                            <span class="minutes hide" id="fminute"></span>
                                            <div class="msmalltext hide">minutes remaining</div>
                                          </div>
                                            <div class="timers">
                                                <svg  class="ssmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                <span class="seconds hide" id="fsecond"></span>
                                                <div class="ssmalltext hide">closing today</div>
                                            </div>
                                    </div>
                                            <div class="timers">
                                                <p id="fdemo"></p>
                                            </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mt-4">
                                            <a href="{{ route('hookup.details',['hookup_slug'=>$featured->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <script>
                            //var open = @php echo strtotime($hookup->open ) @endphp;
                            var jobopen = $('#jobopen').val();
                            console.log(jobopen);
                            var deadline = new Date(jobopen).getTime();

                            var x = setInterval(function() {
                              
                            var now = new Date().getTime();
                            var t = deadline - now;
                            var days = Math.floor(t / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
                            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((t % (1000 * 60)) / 1000);
                            document.getElementById("fday").innerHTML =days ;
                            document.getElementById("fhour").innerHTML =hours;
                            document.getElementById("fminute").innerHTML = minutes; 
                            document.getElementById("fsecond").innerHTML =seconds; 
                            if (t < 0) {
                                    clearInterval(x);
                                    document.getElementById("fdemo").innerHTML = "Closed";
                                    document.getElementById("fday").innerHTML ='0';
                                    document.getElementById("fhour").innerHTML ='0';
                                    document.getElementById("fminute").innerHTML ='0' ; 
                                    document.getElementById("fsecond").innerHTML = '0'; }
                            if(days <= 0)
                            {
                                $("#fday").hide();
                                $(".dsmalltext").hide();
                                $("#fminute").show();
                                $(".msmalltext").show();
                                $("#fminute").removeClass("hide");
                                $(".msmalltext").removeClass("hide");
                            }
                            if(days > 0)
                            {
                                $("#fminute").hide();
                                $(".msmalltext").hide();
                                $("#fday").removeClass("hide");
                                $(".dsmalltext").removeClass("hide");
                            }
                            if(minutes <= 0)
                            {
                                $("#fminute").hide();
                                $(".msmalltext").hide();
                                $("#fsecond").show();
                                $(".ssmalltext").show();
                                $("#fsecond").removeClass("hide");
                                $(".ssmalltext").removeClass("hide");
                                
                            }
                            if(minutes > 0)
                            {
                                $("#fsecond").hide();
                                $(".ssmalltext").hide();
                            }
                            if(seconds <= 0)
                            {
                                $("#fsecond").hide();
                                $(".ssmalltext").hide();
                            }
                            if(hours <= 0 && hours >= 0 )
                            {
                                $("#fhour").hide();
                                $(".hsmalltext").hide();
                            }
                            }, 
                            1000
                            );
                            </script>
                            @endforeach
    
                        </div>
                    </div>
                </div>
            </div>
            <div id="part-job" class="tab-pane fade" role="tabpanel" aria-labelledby="part-job-tab">
                <div id="recent-job" class="tab-pane fade in active tab-pane" role="tabpanel" aria-labelledby="recent-job-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach ($pt_hookups as $parttime)
                            @if ($parttime->open <= now())
                       
                        @else
                        <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                            <div class="lable text-center pt-2 pb-2">
                                <ul class="list-unstyled best text-white mb-0 text-uppercase">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <div class="mo-mb-2">
                                                <img src="{{ asset('assets/images/hookups') }}/{{$parttime->images}}" alt="{{$parttime->jobtitle}}" class="img-fluid mx-auto d-block" width="84" height="84">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>
                                            <h5 class="f-18" style="margin-bottom: -25px"><a href="{{ route('hookup.details',['hookup_slug'=>$parttime->slug]) }}" class="text-dark">{{$parttime->jobtitle}}</a></h5>
                                            <p class="text-muted mb-0">{{$parttime->company}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$parttime->location}}</p>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <div>
                                            <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">$</span>{{$hookup->price}}</p>
                                        </div>
                                    </div>--}}
                                    <div class="col-md-2">
                                        <div>
                                            <p class="text-muted mb-0">{{$parttime->schedule}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-3 bg-light">
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-2">
                                        <div>
                                            <p class="text-muted" style="margin:10px 0 10px 0"><span class="text-dark">Experience :</span> {{$parttime->experience}}</p>
                                        </div>
                                    </div>
                                   <div class="col-md-4">
                                    <div id="clockdiv">
                                        <input type="hidden" id="jobopen" value="{{ $parttime->open }}">
                                        <div class="timers">
                                                <svg class="days hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#00B55E" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                <span class="dsmalltext hide" id="pday"></span>
                                                <div class="dsmalltext hide">days remaining</div>
                                            </div> 
                                        
                                          <div>
                                            <span class="hours" id="phour" style="display: none !important"></span>
                                            <div class="hsmalltext" style="display: none !important">Hours</div>
                                          </div>
                                          <div class="timers">
                                            <svg class="msmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                            <span class="minutes hide" id="pminute"></span>
                                            <div class="msmalltext hide">minutes remaining</div>
                                          </div>
                                            <div class="timers">
                                                <svg  class="ssmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                <span class="seconds hide" id="psecond"></span>
                                                <div class="ssmalltext hide">closing today</div>
                                            </div>
                                    </div>
                                            <div class="timers">
                                                <p id="pdemo"></p>
                                            </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mt-4">
                                            <a href="{{ route('hookup.details',['hookup_slug'=>$parttime->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <script>
                            //var open = @php echo strtotime($hookup->open ) @endphp;
                            var jobopen = $('#jobopen').val();
                            console.log(jobopen);
                            var deadline = new Date(jobopen).getTime();

                            var x = setInterval(function() {
                              
                            var now = new Date().getTime();
                            var t = deadline - now;
                            var days = Math.floor(t / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
                            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((t % (1000 * 60)) / 1000);
                            document.getElementById("pday").innerHTML =days ;
                            document.getElementById("phour").innerHTML =hours;
                            document.getElementById("pminute").innerHTML = minutes; 
                            document.getElementById("psecond").innerHTML =seconds; 
                            if (t < 0) {
                                    clearInterval(x);
                                    document.getElementById("pdemo").innerHTML = "Closed";
                                    document.getElementById("pday").innerHTML ='0';
                                    document.getElementById("phour").innerHTML ='0';
                                    document.getElementById("pminute").innerHTML ='0' ; 
                                    document.getElementById("psecond").innerHTML = '0'; }
                            if(days <= 0)
                            {
                                $("#pday").hide();
                                $(".dsmalltext").hide();
                                $("#pminute").show();
                                $(".msmalltext").show();
                                $("#pminute").removeClass("hide");
                                $(".msmalltext").removeClass("hide");
                            }
                            if(days > 0)
                            {
                                $("#pminute").hide();
                                $(".msmalltext").hide();
                                $("#pday").removeClass("hide");
                                $(".dsmalltext").removeClass("hide");
                            }
                            if(minutes <= 0)
                            {
                                $("#pminute").hide();
                                $(".msmalltext").hide();
                                $("#psecond").show();
                                $(".ssmalltext").show();
                                $("#psecond").removeClass("hide");
                                $(".ssmalltext").removeClass("hide");
                                
                            }
                            if(minutes > 0)
                            {
                                $("#psecond").hide();
                                $(".ssmalltext").hide();
                            }
                            if(seconds <= 0)
                            {
                                $("#psecond").hide();
                                $(".ssmalltext").hide();
                            }
                            if(hours <= 0 && hours >= 0 )
                            {
                                $("#phour").hide();
                                $(".hsmalltext").hide();
                            }
                            }, 
                            1000
                            );
                            </script>
                            @endforeach
    
                        </div>
                    </div>
                </div>
            </div>
            <div id="full-job" class="tab-pane fade" role="tabpanel" aria-labelledby="full-job-tab">
                <div id="recent-job" class="tab-pane fade in active tab-pane" role="tabpanel" aria-labelledby="recent-job-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach ($ft_hookups as $fulltime)
                            @if ($fulltime->open <= now())
                       
                        @else
                        <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                            <div class="lable text-center pt-2 pb-2">
                                <ul class="list-unstyled best text-white mb-0 text-uppercase">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <div class="mo-mb-2">
                                                <img src="{{ asset('assets/images/hookups') }}/{{$fulltime->images}}" alt="{{$fulltime->jobtitle}}" class="img-fluid mx-auto d-block" width="84" height="84">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div>
                                            <h5 class="f-18" style="margin-bottom: -25px"><a href="{{ route('hookup.details',['hookup_slug'=>$fulltime->slug]) }}" class="text-dark">{{$fulltime->jobtitle}}</a></h5>
                                            <p class="text-muted mb-0">{{$fulltime->company}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$fulltime->location}}</p>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <div>
                                            <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">$</span>{{$hookup->price}}</p>
                                        </div>
                                    </div>--}}
                                    <div class="col-md-2">
                                        <div>
                                            <p class="text-muted mb-0">{{$fulltime->schedule}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-3 bg-light">
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-2">
                                        <div>
                                            <p class="text-muted" style="margin:10px 0 10px 0"><span class="text-dark">Experience :</span> {{$fulltime->experience}}</p>
                                        </div>
                                    </div>
                                   <div class="col-md-4">
                                    <div id="clockdiv">
                                        <input type="hidden" id="jobopen" value="{{ $fulltime->open }}">
                                        <div class="timers">
                                                <svg class="days hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#00B55E" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                <span class="dsmalltext hide" id="tday"></span>
                                                <div class="dsmalltext hide">days remaining</div>
                                            </div> 
                                        
                                          <div>
                                            <span class="hours" id="thour" style="display: none !important"></span>
                                            <div class="hsmalltext" style="display: none !important">Hours</div>
                                          </div>
                                          <div class="timers">
                                            <svg class="msmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                            <span class="minutes hide" id="tminute"></span>
                                            <div class="msmalltext hide">minutes remaining</div>
                                          </div>
                                            <div class="timers">
                                                <svg  class="ssmalltext hide" viewBox="0 0 24 24" width="20" aria-hidden="true" focusable="false" fill="#EB3737" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-ea9ulj-0 bWRyML"><path d="M13 3h4v2h-4zM3 8h4v2H3zm0 8h4v2H3zm-1-4h3.99v2H2zm19.707-5.293-1.414-1.414L18.586 7A6.937 6.937 0 0 0 15 6c-3.859 0-7 3.141-7 7s3.141 7 7 7 7-3.141 7-7a6.968 6.968 0 0 0-1.855-4.73l1.562-1.563zM16 14h-2V8.958h2V14z"></path></svg>
                                                <span class="seconds hide" id="tsecond"></span>
                                                <div class="ssmalltext hide">closing today</div>
                                            </div>
                                    </div>
                                            <div class="timers">
                                                <p id="tdemo"></p>
                                            </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mt-4">
                                            <a href="{{ route('hookup.details',['hookup_slug'=>$fulltime->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <script>
                            //var open = @php echo strtotime($hookup->open ) @endphp;
                            var jobopen = $('#jobopen').val();
                            console.log(jobopen);
                            var deadline = new Date(jobopen).getTime();

                            var x = setInterval(function() {
                              
                            var now = new Date().getTime();
                            var t = deadline - now;
                            var days = Math.floor(t / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
                            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((t % (1000 * 60)) / 1000);
                            document.getElementById("tday").innerHTML =days ;
                            document.getElementById("thour").innerHTML =hours;
                            document.getElementById("tminute").innerHTML = minutes; 
                            document.getElementById("tsecond").innerHTML =seconds; 
                            if (t < 0) {
                                    clearInterval(x);
                                    document.getElementById("tdemo").innerHTML = "Closed";
                                    document.getElementById("tday").innerHTML ='0';
                                    document.getElementById("thour").innerHTML ='0';
                                    document.getElementById("tminute").innerHTML ='0' ; 
                                    document.getElementById("tsecond").innerHTML = '0'; }
                            if(days <= 0)
                            {
                                $("#tday").hide();
                                $(".dsmalltext").hide();
                                $("#tminute").show();
                                $(".msmalltext").show();
                                $("#tminute").removeClass("hide");
                                $(".msmalltext").removeClass("hide");
                            }
                            if(days > 0)
                            {
                                $("#tminute").hide();
                                $(".msmalltext").hide();
                                $("#tday").removeClass("hide");
                                $(".dsmalltext").removeClass("hide");
                            }
                            if(minutes <= 0)
                            {
                                $("#tminute").hide();
                                $(".msmalltext").hide();
                                $("#tsecond").show();
                                $(".ssmalltext").show();
                                $("#tsecond").removeClass("hide");
                                $(".ssmalltext").removeClass("hide");
                                
                            }
                            if(minutes > 0)
                            {
                                $("#tsecond").hide();
                                $(".ssmalltext").hide();
                            }
                            if(seconds <= 0)
                            {
                                $("#tsecond").hide();
                                $(".ssmalltext").hide();
                            }
                            if(hours <= 0 && hours >= 0 )
                            {
                                $("#thour").hide();
                                $(".hsmalltext").hide();
                            }
                            }, 
                            1000
                            );
                            </script>
                            @endforeach
    
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


