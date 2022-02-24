<div>
    <div class="page-content">
  
      <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
          <h4 class="mb-3 mb-md-0">Edit Profile Dashboard</h4>
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
            <div class="col-md-2 grid-margin stretch-card"></div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <form class="form-horizontal" wire:submit.prevent="updateProfile">
                    <div class="form-group">
                        <label for="newimage" class="control-label col-md-3">Profile Image: </label>
                        <div class="col-md-9">
                            <input type="file" class="form-control input-file" name="newimage" wire:model="newimage"/>
                            @if ($newimage) 
                               <img src="{{ $newimage->temporaryUrl() }}" width="20%"/>
                             @elseif ($image) 
                                <img src="{{ asset('assets/images/profiles')}}/{{ $user->profile->image }}" width="20%"/>
                            @else
                                <img src="{{ asset('assets/images/profiles/default.jpg')}}" width="20%"/>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="phone" class="control-label col-md-3">Phone: </label>
                      <div class="col-md-9">
                          <textarea class="form-control" name="phone" wire:model="phone"></textarea>
                      </div>
                  </div>
                    <div class="form-group">
                        <label for="about" class="control-label col-md-3">About: </label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="about" wire:model="about"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="control-label col-md-3">City: </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="city" wire:model="city"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="service_locations" class="control-label col-md-3">Locations Zipcode/Pincode: </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="service_locations" wire:model="locations"/>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- row -->
  </div>