<div>
  <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                    <div class="bg-picture card-body">
                        <div class="d-flex align-items-top">
                          @if (Session::has('message'))
                              <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                          @endif
                            <div class="flex-grow-1 overflow-hidden">
                              <form class="form-horizontal" wire:submit.prevent="updateProfile">
                                  <div class="form-group">
                                      <label for="newimage" class="control-label col-md-3">Profile Image: </label>
                                      <div class="col-md-9">
                                        @if ($newimage) 
                                        <img src="{{ $newimage->temporaryUrl() }}" width="20%"/>
                                      @elseif ($image) 
                                          <img src="{{ asset('assets/images/profiles')}}/{{ $user->profile->image }}" class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail"/>
                                      @else
                                          <img src="{{ asset('assets/images/profiles/default.jpg')}}" class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail"/>
                                      @endif
                                          <input type="file" class="form-control input-file mt-3" name="newimage" wire:model="newimage" class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail"/>
                                      </div>
                                  </div>
                                  <div class="form-group mt-3">
                                    <label for="name" class="control-label col-md-3">Name: </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" wire:model="name"/>
                                    </div>
                                </div>
                                  <div class="form-group mt-3">
                                    <label for="phone" class="control-label col-md-3">Phone: </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="phone" wire:model="phone"/>
                                    </div>
                                </div>
                                  <div class="form-group mt-3">
                                      <label for="about" class="control-label col-md-3">About: </label>
                                      <div class="col-md-9">
                                          <textarea class="form-control" name="about" wire:model="about"></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group mt-3">
                                      <label for="city" class="control-label col-md-3">City: </label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" name="city" wire:model="city"/>
                                      </div>
                                  </div>
                                  <div class="form-group mt-3 mb-3">
                                      <label for="service_locations" class="control-label col-md-3">Locations Zipcode/Pincode: </label>
                                      <div class="col-md-9">
                                          <input type="text" class="form-control" name="service_locations" wire:model="locations"/>
                                      </div>
                                  </div>
                                  <button type="submit" class="btn btn-success pull-right">Update Profile</button>
                              </form>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                    <!--/ meta -->
                </div>
            </div>    
        </div> <!-- container -->

    </div> <!-- content -->
</div>
   
