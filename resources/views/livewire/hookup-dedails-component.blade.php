<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12" style="margin-top: 50px;">
                <h4 class="text-dark mb-3">{{$hookup->name }}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="job-detail border rounded p-4">
                    <div class="job-detail-content">
                        <img src="{{ asset('assets/images/hookups') }}/{{$hookup->images}}" alt="{{$hookup->name}}" class="img-fluid float-left mr-md-3 mr-2 mx-auto d-block" width="84" height="84">
                        <div class="job-detail-com-desc overflow-hidden d-block">
                            <h4 class="mb-2"><a href="#" class="text-dark">{{$hookup->schedule}}</a></h4>
                            <p class="text-muted mb-0"><i class="fa fa-building mr-2"></i>{{$hookup->company}}</p>
                            <p class="text-muted mb-0"><i class="fa fa-map-marker mr-2"></i>{{$hookup->location}} | {{$hookup->fjob}}</p>
                            <p class="text-muted mb-0"><i class="fa fa-briefcase mr-2"></i>{{$hookup->jobtitle}}</p>
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
                        @if ($hookup->email  == 'hookup@example.com') 
                        @else
                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-envelope text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->email}}</p>
                        </div>
                        @endif
                        @if ($hookup->jobUrl  == 'example.com') 
                        @else
                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-globe text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->web}}</p>
                        </div>
                        @endif
                        @if ($hookup->phone  == '254700000000') 
                        @elseif ($hookup->phone  == '254700 000 000') 
                        @else
                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-mobile text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->phone}}</p>
                        </div>
                        @endif
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
                       @if ($hookup->email)
                        <a href="mailto:{{ $hookup->email }}?Subject={{ $hookup->name }}&body=Dear%20{{ $hookup->company }}" class="btn btn-primary btn-block rounded" target="_blank">Apply For Job </a>
                        @else
                        <a href="#" class="btn btn-primary btn-block rounded disabled" target="_blank">Apply For Job </a>
                        @endif
                        <h6 class="text-dark f-17 mt-4 mb-0">Share Job :</h6>
                       {{-- <ul class="social-icon list-inline mt-3 mb-0">
                            <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="rounded" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=http://jorenvanhocht.be" class="rounded" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="https://wa.me/?text=http://jorenvanhocht.be" class="rounded" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://jorenvanhocht.be&amp;title=my share text&amp;summary=dit is de linkedin summary" class="rounded" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        </ul> --}} 
                        {!! Share::page(url('/hookup-details/'. $hookup->slug))->facebook()->twitter()->whatsapp()->linkedin() !!}
                    @else
                        <a href="{{ $hookup->jobUrl }}" class="btn btn-primary btn-block rounded">Apply For Job</a>
                        <h6 class="text-dark f-17 mt-4 mb-0">Share Job :</h6>
                        {!! Share::page(url('/hookup-details/'. $hookup->slug))->facebook()->twitter()->whatsapp()->linkedin()  !!}
                       {{-- <ul class="social-icon list-inline mt-3 mb-0">
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-linkedin"></i></a></li>
                        </ul> --}} 
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
 <style>
    .social-btn-sp #social-links {
        margin: 0 auto;
        max-width: 100%;
    }
    .social-btn-sp #social-links ul li {
        display: inline-block;
    }          
    .social-btn-sp #social-links ul li a {
        color: #3c4858;
        border: 1px solid #3c4858;
        border-top-color: rgb(60, 72, 88);
        border-right-color: rgb(60, 72, 88);
        border-bottom-color: rgb(60, 72, 88);
        border-left-color: rgb(60, 72, 88);
        display: inline-block;
        height: 32px;
        text-align: center;
        font-size: 15px;
        width: 32px;
        line-height: 30px;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
        overflow: hidden;
        position: relative;
        border-radius: 50% !important;
        padding: 15px;
    }
    #social-links{
        display: inline-table;
    }
   #social-links ul li{
        display: inline;
    }
  #social-links ul li a{
         color: #3c4858;
        border: 1px solid #3c4858;
        border-top-color: rgb(60, 72, 88);
        border-right-color: rgb(60, 72, 88);
        border-bottom-color: rgb(60, 72, 88);
        border-left-color: rgb(60, 72, 88);
        display: inline-block;
        height: 32px;
        text-align: center;
        font-size: 15px;
        width: 32px;
        line-height: 30px;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
        overflow: hidden;
        position: relative;
        border-radius: 50% !important;
        margin: 5px;
    }
</style>