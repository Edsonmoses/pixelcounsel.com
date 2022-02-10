<div>
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12" style="margin-top: 50px;">
                <h4 class="text-dark mb-3">{{$hookup->jobtitle }}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="job-detail border rounded p-4">
                    <div class="job-detail-content">
                        <img src="{{ asset('assets/images/featured-job/img-4.png') }}" alt="" class="img-fluid float-left mr-md-3 mr-2 mx-auto d-block">
                        <div class="job-detail-com-desc overflow-hidden d-block">
                            <h4 class="mb-2"><a href="#" class="text-dark">{{$hookup->jobtitle}}</a></h4>
                            <p class="text-muted mb-0"><i class="fa fa-link mr-2"></i>{{$hookup->company}}</p>
                            <p class="text-muted mb-0"><i class="fa fa-map-marker mr-2"></i>{{$hookup->location}}</p>
                        </div>
                    </div>

                    <div class="job-detail-desc mt-4">
                        <p class="text-muted mb-3">{!! html_entity_decode($hookup->short_description)!!}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-dark mt-4 h5">Job Description :</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <p class="text-muted mb-3">{!! html_entity_decode($hookup->description)!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--@if ($Qualification)
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-dark mt-4 h5">Qualification :</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Morbi mattis ullamcorper velit. Phasellus gravida semper nisi nullam vel sem.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Pellentesque auctor neque nec urna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-0">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif  --}}
                {{-- @if ($responsibilities)
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-dark mt-4 h5">Primary Responsibilities :</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">HTML, CSS &amp; Scss</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Javascript</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">PHP</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Photoshop</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-0">Illustrator</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif  --}}
            </div>

            <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 job-detailed">
                <div class="job-detail border rounded p-4">
                    <h5 class="text-muted text-center pb-2 h5"><i class="fa fa-map-marker mr-2"></i>Location</h5>

                    <div class="job-detail-location pt-4 border-top">
                        <div class="job-details-desc-item mt-4">
                            <div class="float-left mr-2">
                                <i class="fa fa-bank text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->company}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-envelope text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->email}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-globe text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->web}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-mobile text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->phone}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-usd text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->price}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-shield text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->experience}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-clock-o text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: @php 
                            $seconds = time() - strtotime($hookup->created_at); 
                            echo calculate_time_span($seconds); @endphp</p>
                        </div>
                        <div class="job-details-desc-item mb-2" style="margin: -29px 0 0 0 !important">
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
                                <p class="text-muted" style="height: 1px"></p>
                        </div>

                       
                    </div>
                </div>

               <div class="job-detail mt-4 p-4">
                    @livewire('right-ads-component')
                </div>

                <div class="job-detail rounded mt-3">
                    @if ($hookup->jobUrl) 
                        <a href="{{ $hookup->jobUrl }}" class="btn btn-primary btn-block rounded" target="_blank">Apply For Job</a>
                        <h6 class="text-dark f-17 mt-4 mb-0">Share Job :</h6>
                        <ul class="social-icon list-inline mt-3 mb-0">
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    @else
                        <a href="#apply-job" class="btn btn-primary btn-block rounded">Apply For Job</a>
                        <h6 class="text-dark f-17 mt-4 mb-0">Share Job :</h6>
                        <ul class="social-icon list-inline mt-3 mb-0">
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@php
    

   function calculate_time_span($seconds)
{  
 $year = floor($seconds /31556926);
$months = floor($seconds /2629743);
$week=floor($seconds /604800);
$day = floor($seconds /86400); 
$hours = floor($seconds / 3600);
 $mins = floor(($seconds - ($hours*3600)) / 60); 
$secs = floor($seconds % 60);
 if($seconds < 60) $time = $secs." seconds ago";
 else if($seconds < 3600 ) $time =($mins==1)?$mins."now":$mins." mins ago";
 else if($seconds < 86400) $time = ($hours==1)?$hours." hour ago":$hours." hours ago";
 else if($seconds < 604800) $time = ($day==1)?$day." day ago":$day." days ago";
 else if($seconds < 2629743) $time = ($week==1)?$week." week ago":$week." weeks ago";
 else if($seconds < 31556926) $time =($months==1)? $months." month ago":$months." months ago";
 else $time = ($year==1)? $year." year ago":$year." years ago";
return $time; 
}  
@endphp
<script>
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
