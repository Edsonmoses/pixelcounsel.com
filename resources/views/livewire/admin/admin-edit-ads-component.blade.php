<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Edit an Ad</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
          <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control">
        </div>
        <a href="{{route('admin.ads')}}" class="btn btn-success pull-right">All Ads</a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
                <style>
                    nav svg{
                        height: 20px;
                    }
                    nav .hidden{
                        display: block !important;
                    }
                </style>
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                      <form class="form-horizontal" wire:submit.prevent="updateAds">
                          <div class="form-group">
                              <label class="col-md-6 control-label">Ad Name</label>
                              <div class="col-md-6">
                                  <input type="text" placeholder="Ad Name" class="form-control input-md" wire:model="name"/>
                                  @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-6 control-label">Ad Position</label>
                            <div class="col-md-6">
                                <select class="form-control" wire:model="position">
                                    <option value="">Select Ad Position</option>
                                        <option value="1">Top</option>
                                        <!--<option value="2">Left</option>-->
                                        <option value="3">Right</option>
                                        <option value="4">Bottom</option>
                                </select>
                                @error('position')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label">Ad Start Date</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Start date" class="form-control input-md" wire:model="startdate"/>
                                @error('startdate')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label">Ad End Date</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="End date" class="form-control input-md" wire:model="endate"/>
                                @error('endate')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label">Ad Image</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control input-file" wire:model="newimage">
                                @if($newimage)
                                    <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                                @else
                                <img src="{{ asset('assets/images/advertis')}}/{{ $image }}" width="120"/>
                                 @endif
                                @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label">Ad Status</label>
                            <div class="col-md-6">
                                <select class="form-control" wire:model="status">
                                    <option value="">Select status</option>
                                        <option value="0">Off</option>
                                        <option value="1">On</option>
                                </select>
                                @error('status')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label"></label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div><!-- row -->

