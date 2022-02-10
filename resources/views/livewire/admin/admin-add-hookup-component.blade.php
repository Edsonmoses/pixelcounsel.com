<div class="page-content">
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Add New Hookup</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
          <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control">
        </div>
        <a href="{{route('admin.hookup')}}" class="btn btn-success pull-right">All Hookups</a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif
      <form class="form-horizontal" wire:submit.prevent="addHookup">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Hookup Name</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Hookup Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                        @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Hookup Slug</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Hookup Slug" class="form-control input-md" wire:model="slug"/>
                        @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Company</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Company" class="form-control input-md" wire:model="company">
                        @error('company')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Preferred Skills</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Preferred Skills" class="form-control input-md" wire:model="jobtitle">
                        @error('jobtitle')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-12 control-label">Location</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Location" class="form-control input-md" wire:model="location">
                        @error('location')<p class="text-danger">{{ $message }}</p>@enderror 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Experience</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Experience" class="form-control input-md" wire:model="experience">
                        @error('experience')<p class="text-danger">{{ $message }}</p>@enderror 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Salary</label>
                    <div class="col-md-12">
                            <select class="form-control" wire:model="price">
                                <option value="">Add Salary</option>
                                    <option value="n/a">N/A</option>
                                    <option value="yes">Yes</option>
                            </select>
                        @error('price')<p class="text-danger">{{ $message }}</p>@enderror 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Job Types</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Job Types (Full time)" class="form-control input-md" wire:model="schedule">
                        @error('schedule')<p class="text-danger">{{ $message }}</p>@enderror 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Phone</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Phone Number" class="form-control input-md" wire:model="phone">
                        @error('phone')<p class="text-danger">{{ $message }}</p>@enderror 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Image</label>
                    <div class="col-md-12">
                        <input type="file" class="form-control input-file" wire:model="images">
                        @if($images)
                            <img src="{{ $images->temporaryUrl() }}" width="120"/>
                        @else
                        <img src="{{ asset('assets/images/hookups/defult.jpg')}}" width="120"/>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Email</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Email" class="form-control input-md" wire:model="email">
                        @error('email')<p class="text-danger">{{ $message }}</p>@enderror 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Web site</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Web Site" class="form-control input-md" wire:model="web">
                        @error('web')<p class="text-danger">{{ $message }}</p>@enderror 
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-6 control-label">Short Description</label>
                    <div class="col-md-12" wire:ignore>
                        <textarea style="height: 100px" placeholder="Short Description" id="short_description" class="form-control" wire:model="short_description"></textarea>
                        @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-6 control-label">Description</label>
                    <div class="col-md-12" wire:ignore>
                        <textarea style="height: 100px" placeholder="Description" id="description" class="form-control" wire:model="description"></textarea>
                        @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Apply Url</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Apply here or from another site link" class="form-control input-md" wire:model="jobUrl">
                        @error('jobUrl')<p class="text-danger">{{ $message }}</p>@enderror 
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Hookup Category</label>
                    <div class="col-md-12"><select class="form-control" wire:model="hookup_categories_id">
                            <option value="">Select Hookup Category</option>
                            @foreach ( $hookupcategories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('hookup_categories_id')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>--}}
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-6 control-label">Job Category</label>
                    <div class="col-md-12">
                        <select class="form-control" wire:model="fjob">
                            <option value="">Select Job Category</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Full Time">Full Time</option>
                        </select>
                        @error('fjob')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group app-label mt-2 mr-2">
                    <label class="text-muted"> End Date </label>
                    <input wire:model="open"
                    type="text" class="form-control input-md datepicker" placeholder="End Date" autocomplete="off"
                    data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" data-date-today-highlight="true"                        
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-6 control-label"></label>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
           </div>
        </form>
          </div>
        </div>
      </div>
    </div> <!-- row -->
    @push('scripts')
  <script type= text/javascript>
    $(function() {
        tinymce.init({
            selector:'#short_description',
            setup:function(editor) {
                editor.on('Change',function(e) {
                    tinyMCE.triggerSave();
                    var sd_data = $('#short_description').val();
                    @this.set('short_description',sd_data);
                });
            }
        });

        tinymce.init({
            selector:'#description',
            setup:function(editor) {
                editor.on('Change',function(e) {
                    tinyMCE.triggerSave();
                    var sd_data = $('#description').val();
                    @this.set('description',sd_data);
                });
            }
        });
    });
    
</script>
  @endpush


