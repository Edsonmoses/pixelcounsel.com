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
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 hook-search heading-mt">
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
</header>
	<!-- Main Content -->
	{{--<div class="container">
		<div class="hookup">
            <div class="container">
                <div class="row">
                <div class="col-lg-5 col-md-5 hook-search">
                    <div class="vector-search heading-mt">  
                        <div class="input-group">
                        <input class="form-control" placeholder="Find a logo here" type="text" wire:model="searchTerm">
                        <div class="input-group-btn">
                        <button type="submit" id="searchbtn">
                            <i class="fa fa-search" aria-hidden="true"></i> </button>
                        </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-12 col-md-12">
                        <form action="#">
                            <div class="checkbox-inline">
                                <a href="/hookup" style="margin-right:20px">
                                  <label class="checkbox-inline" for="executive">
                                  <input type="checkbox" class="form-check-input" id="executive" {{  url('/hookup') == url()->current() ? 'checked' : '' }} name="optradio" value="all">All
                                </label></a>
                            @foreach ($hookupcategories as $h_catagory)
                            <div class="checkbox-inline">
                              <a href="{{ route('hookup.category',['category_slug'=>$h_catagory->slug]) }}">
                                <label class="checkbox-inline" for="executive">
                                <input type="checkbox" class="form-check-input" id="executive" {{ route('hookup.category', ['category_slug'=>$h_catagory->slug]) == url()->current() ? 'checked' : '' }} name="optradio" value="{{ $h_catagory->name}}">{{ $h_catagory->name}}
                              </label></a>
                            </div>
                            @endforeach
                
                          </form>
                          
                    </div>
                </div>
            </div>
		</div>
	</div>--}}
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
                                    <div class="col-md-3">
                                        <div>
                                            <h5 class="f-18"><a href="{{ route('hookup.details',['hookup_slug'=>$hookup->slug]) }}" class="text-dark">{{$hookup->jobtitle}}</a></h5>
                                            <p class="text-muted mb-0">{{$hookup->company}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$hookup->location}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">$</span>{{$hookup->price}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div>
                                            <p class="text-muted mb-0">{{$hookup->schedule}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-3 bg-light">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div>
                                            <p class="text-muted ml-3 mb-4 mo-mb-2"><span class="text-dark">Experience :</span> {{$hookup->experience}}</p>
                                        </div>
                                    </div>
                                   {{--<div class="col-md-6">
                                        <div>
                                            <p class="text-muted mb-0 mo-mb-2"><span class="text-dark">Notes :</span> {{$hookup->short_description}} </p>
                                        </div>
                                    </div>--}}
                                    <div class="col-md-2">
                                        <div class="mt-5">
                                            <a href="{{ route('hookup.details',['hookup_slug'=>$hookup->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div id="featured-job" class="tab-pane fade" role="tabpanel" aria-labelledby="featured-job-tab">
                <div id="recent-job" class="tab-pane fade in active tab-pane" role="tabpanel" aria-labelledby="recent-job-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach ($f_hookups as $featured)
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
                                        <div class="col-md-3">
                                            <div>
                                                <h5 class="f-18"><a href="{{ route('hookup.details',['hookup_slug'=>$featured->slug]) }}" class="text-dark">{{$featured->jobtitle}}</a></h5>
                                                <p class="text-muted mb-0">{{$featured->company}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div>
                                                <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$featured->location}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">$</span>{{$featured->price}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <p class="text-muted mb-0">{{$featured->schedule}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 bg-light">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div>
                                                <p class="text-muted mb-0 mo-mb-2"><span class="text-dark">Experience :</span> {{$featured->experience}}</p>
                                            </div>
                                        </div>
                                        {{--<div class="col-md-6">
                                            <div>
                                                <p class="text-muted mb-0 mo-mb-2"><span class="text-dark">Notes :</span> {{$featured->short_description}} </p>
                                            </div>
                                        </div>--}}
                                        <div class="col-md-2">
                                            <div class="mt-5">
                                                <a href="{{ route('hookup.details',['hookup_slug'=>$featured->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <div class="col-md-3">
                                            <div>
                                                <h5 class="f-18"><a href="{{ route('hookup.details',['hookup_slug'=>$parttime->slug]) }}" class="text-dark">{{$parttime->jobtitle}}</a></h5>
                                                <p class="text-muted mb-0">{{$parttime->company}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div>
                                                <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$parttime->location}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">$</span>{{$parttime->price}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <p class="text-muted mb-0">{{$parttime->schedule}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 bg-light">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                <p class="text-muted mb-0 mo-mb-2"><span class="text-dark">Experience :</span> {{$parttime->experience}}</p>
                                            </div>
                                        </div>
                                        {{--<div class="col-md-6">
                                            <div>
                                                <p class="text-muted mb-0 mo-mb-2"><span class="text-dark">Notes :</span> {{$parttime->short_description}} </p>
                                            </div>
                                        </div>--}}
                                        <div class="col-md-2">
                                            <div class="mt-5">
                                                <a href="{{ route('hookup.details',['hookup_slug'=>$parttime->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <div class="col-md-3">
                                            <div>
                                                <h5 class="f-18"><a href="{{ route('hookup.details',['hookup_slug'=>$fulltime->slug]) }}" class="text-dark">{{$fulltime->jobtitle}}</a></h5>
                                                <p class="text-muted mb-0">{{$fulltime->company}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div>
                                                <p class="text-muted mb-0"><i class="fa fa-map-marker text-primary mr-2"></i>{{$fulltime->location}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">$</span>{{$fulltime->price}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <p class="text-muted mb-0">{{$fulltime->schedule}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 bg-light">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div>
                                                <p class="text-muted mb-0 mo-mb-2"><span class="text-dark">Experience :</span> {{$fulltime->experience}}</p>
                                            </div>
                                        </div>
                                       {{--<div class="col-md-6">
                                            <div>
                                                <p class="text-muted mb-0 mo-mb-2"><span class="text-dark">Notes :</span> {{$fulltime->short_description}} </p>
                                            </div>
                                        </div>--}}
                                        <div class="col-md-2">
                                            <div class="mt-5">
                                                <a href="{{ route('hookup.details',['hookup_slug'=>$fulltime->slug]) }}" class="text-primary">Apply Now <i class="fa fa-angle-double-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
