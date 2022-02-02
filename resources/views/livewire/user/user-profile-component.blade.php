<div>
    <div class="page-content">
  
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">{{ Auth::user()->name }} Profile Dashboard</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
          <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
            <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
          <div class="row flex-grow">
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        @if (!empty($uprofile->image))
                            @if ($uprofile->image)
                                <img src="{{ asset('assets/images/profiles') }}/{{$uprofile->image}}" width="100%"/>
                            @else
                                <img src="{{ asset('assets/images/profiles/default.jpg') }}" width="100%"/>
                            @endif
                        @else
                        <img src="{{ asset('assests/images/profiles/default.jpg') }}" width="100%"/>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-0">Name: {{ Auth::user()->name }}</h6>
                    <hr/>
                    @if (!empty($uprofile->about))
                    <p>{{ $uprofile->about }}</p>
                    <hr/>
                    @endif
                    <p><b>Email: </b>{{ Auth::user()->email }}</p>
                    <hr/>
                    <p><b>Phone: </b>{{ Auth::user()->phone }}</p>
                    <hr/>
                    @if (!empty($uprofile->city))
                    <p><b>City: </b>{{ $uprofile->city }}</p>
                    <hr/>
                    @endif
                    @if (!empty($uprofile->locations))
                    <p><b>Locations: </b>{{ $uprofile->locations }}</p>
                    <hr/>
                    @endif
                    <a href="{{ route('user.edit_profile')}}" class="btn btn-info pull-right">Edit Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- row -->
  </div>