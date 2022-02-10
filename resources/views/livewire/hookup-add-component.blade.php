<div>
    <div class="hookup-actives"><div class="hookup-arrows"></div></div>
<header class="intro-header intro-hookup">
  <div class="container">
      <div class="row hookup">
          <div class="col-lg-7 col-md-7 col-sm-7">
              <div class="heading-style">
                  <h1>NEW HOOK UP</h1>
                  <span class="sub-heading">Collection of career changing jobs in Africa for your picking</span>
              </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5 hook-search heading-mt">
            
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
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
              <div class="card overflow-hidden">
                <div>
                  @if (Session::has('message'))
                  <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
              @endif
            <form class="form-horizontal" wire:submit.prevent="storeHookup">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Job Name</label>
                          <div class="col-md-12">
                              <input type="text" placeholder="Hookup Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                              @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>
                  {{-- <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Hookup Slug</label>
                          <div class="col-md-12">
                              <input type="text" placeholder="Hookup Slug" class="form-control input-md" wire:model="slug"/>
                              @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>--}}
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Company</label>
                          <div class="col-md-12">
                              <input type="text" placeholder="Company" class="form-control input-md" wire:model="company">
                              @error('company')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Preferred Skills</label>
                          <div class="col-md-12">
                              <input type="text" placeholder="Preferred Skills" class="form-control input-md" wire:model="jobtitle">
                              @error('jobtitle')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-12">Location</label>
                          <div class="col-md-12">
                              <input type="text" placeholder="Location" class="form-control input-md" wire:model="location">
                              @error('location')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Experience</label>
                          <div class="col-md-12">
                              <input type="text" placeholder="Experience" class="form-control input-md" wire:model="experience">
                              @error('experience')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Salary</label>
                          <div class="col-md-12">
                            <select class="form-control input-md nice-select rounded" wire:model="price">
                                <option value="N/A">N/A</option>
                                <option value="1">Salary</option>
                            </select>
                              @error('price')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Job Types</label>
                          <div class="col-md-12">
                              <input type="text" placeholder="Job Types (Full time)" class="form-control input-md" wire:model="schedule">
                              @error('schedule')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Phone</label>
                          <div class="col-md-12">
                              <input type="text" placeholder="Phone Number" class="form-control input-md" wire:model="phone">
                              @error('phone')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Image</label>
                          <div class="col-md-12">
                              <input type="file" class="form-control input-file" wire:model="images">
                              @if($images)
                                  <img src="{{ $images->temporaryUrl() }}" width="120"/>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Email</label>
                          <div class="col-md-12">
                              <input type="text" placeholder="Email" class="form-control input-md" wire:model="email">
                              @error('email')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Web site</label>
                          <div class="col-md-12">
                              <input type="text" placeholder="Web Site" class="form-control input-md" wire:model="web">
                              @error('web')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-6">Job Category</label>
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-6">Job Description</label>
                        <div class="col-md-12" wire:ignore>
                            <textarea style="height: 100px" placeholder="Description" id="description" class="form-control" wire:model="description"></textarea>
                            @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="col-md-6"> Company BIO</label>
                          <div class="col-md-12" wire:ignore>
                              <textarea style="height: 100px" placeholder="Short Description" id="short_description" class="form-control" wire:model="short_description"></textarea>
                              @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>
                 {{-- <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6">Hookup Category</label>
                          <div class="col-md-12">
                              <select class="form-control" wire:model="hookup_categories_id">
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
                      <div class="form-group pull-left" style="margin-left: -100px !important">
                          <label class="col-md-6"></label>
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
	</div>
  </div>
  <div style="height: 50px"></div>
</div>
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



