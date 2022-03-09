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
                                <form class="form-horizontal" wire:submit.prevent="addVector">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Job Name</label>
                                                <input type="text" placeholder="Job Name" id="name" class="form-control" wire:model="name" wire:keyup="generateSlug">
                                                @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="company" class="form-label">Company</label>
                                                <input type="text" placeholder="Company" id="company" class="form-control" wire:model="company">
                                                @error('company')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="jobtitle" class="form-label">Preferred Skills</label>
                                                    <input type="text" placeholder="Preferred Skills" id="designer" class="form-control" wire:model="jobtitle">
                                                    @error('jobtitle')<p class="text-danger">{{ $message }}</p>@enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="location" class="form-label">Location</label>
                                                    <input type="text" placeholder="Location" id="location" class="form-control"  wire:model="location">
                                                    @error('location')<p class="text-danger">{{ $message }}</p>@enderror 
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="experience" class="form-label"> Experience</label>
                                                    <input type="text" placeholder="Experience" id="experience" class="form-control" wire:model="experience">
                                                    @error('experience')<p class="text-danger">{{ $message }}</p>@enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="price" class="form-label">Salary</label>
                                                    <select class="form-select" id="price" wire:model="price">
                                                        <option value="">Add Salary</option>
                                                            <option value="Confidential">Confidential</option>
                                                            <option value="15,000 - 30,000">Yes</option>
                                                    </select>
                                                    @if($price)
                                                         <input type="text" placeholder="15,000 - 30,000" class="form-control input-md mt-3" wire:model="price">
                                                    @endif
                                                @error('price')<p class="text-danger">{{ $message }}</p>@enderror 
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="schedule" class="form-label">Job Types</label>
                                                    <input type="text" placeholder="Job Types (Creative & Design)" id="schedule" class="form-control"  wire:model="schedule">
                                                    @error('schedule')<p class="text-danger">{{ $message }}</p>@enderror 
                                                </div>
                                            </div>
                                          <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" placeholder="Phone Number" id="phone" class="form-control" wire:model="phone">
                                                @error('phone')<p class="text-danger">{{ $message }}</p>@enderror 
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="images" class="form-label">Image</label>
                                                <input type="file" class="form-control input-file" wire:model="images">
                                                @if($images)
                                                    <img src="{{ $images->temporaryUrl() }}" width="120"/>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" placeholder="Email" id="email" class="form-control"  wire:model="email">
                                                @error('email')<p class="text-danger">{{ $message }}</p>@enderror 
                                            </div>
                                        </div>
                                      <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="web" class="form-label">Web site</label>
                                            <input type="text" placeholder="Web site" id="web" class="form-control" wire:model="web">
                                            @error('web')<p class="text-danger">{{ $message }}</p>@enderror 
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="jobUrl" class="form-label"> Apply Url</label>
                                            <input type="url" placeholder="Apply here or from another site link" id="jobUrl" class="form-control" wire:model="jobUrl">
                                            @error('jobUrl')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="fjob" class="form-label"> Job Category</label>
                                            <select class="form-select" id="fjob" wire:model="fjob">
                                                <option value="">Select Job Category</option>
                                                    <option value="Part Time">Part Time</option>
                                                    <option value="Full Time">Full Time</option>
                                            </select>
                                            @error('fjob')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="slug" class="form-label"> End Date</label>
                                            <input wire:model="open" type="date" placeholder="End Date" autocomplete="on" id="open" class="form-control"data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" data-date-today-highlight="true"                        
                                            onchange="this.dispatchEvent(new InputEvent('input'))">
                                            @error('open')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="short_description" class="form-label">About the company</label>
                                            <textarea class="form-control" id="example-short_description" rows="5" wire:model="short_description"></textarea>
                                            @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror 
                                        </div>
                                    </div>
                                  <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">About the job</label>
                                        <textarea class="form-control" id="description" rows="5" wire:model="description"></textarea>
                                        @error('description')<p class="text-danger">{{ $message }}</p>@enderror 
                                    </div>
                                </div>
                                    </div><!--row-->
                                    <button type="submit" class="btn btn-success pull-right">Post a job</button>
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
     
  