<div>
    <div class="hookup-actives"><div class="hookup-arrows"></div></div>
    <header class="intro-header intro-hookup">
      <div class="container">
          <div class="row hookup">
              <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                  <div class="heading-style">
                      <h1>NEW HOOK UP</h1>
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
	<div class="container">
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
              <div class="card overflow-hidden">
                <div>
                  @if (Session::has('message'))
                  <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
              @endif
            <form class="form-horizontal" id="updated-form" wire:submit.prevent="jobStored">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6 control-label text-left">Job Name</label>
                          <div class="col-md-12  {{ $errors->get('name') ? 'has-error' : '' }}">
                              <input type="text" placeholder="Hookup Name" class="form-control input-md" wire:model.defer="name" wire:keyup="generateSlug"/>
                              @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6" style="display: none">
                      <div class="form-group">
                          <label class="col-md-6 control-label">Job Slug</label>
                          <div class="col-md-12  {{ $errors->get('slug') ? 'has-error' : '' }}">
                              <input type="text" placeholder="Hookup Slug" class="form-control input-md" wire:model="slug"/>
                              @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6 control-label">Company</label>
                          <div class="col-md-12  {{ $errors->get('company') ? 'has-error' : '' }}">
                              <input type="text" placeholder="Company" class="form-control input-md" wire:model.defer="company">
                              @error('company')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6 control-label">Preferred Skills</label>
                          <div class="col-md-12  {{ $errors->get('jobtitle') ? 'has-error' : '' }}">
                              <input type="text" placeholder="Preferred Skills" class="form-control input-md" wire:model.defer="jobtitle">
                              @error('jobtitle')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-12 control-label">Location</label>
                          <div class="col-md-12  {{ $errors->get('location') ? 'has-error' : '' }}">
                              <input type="text" placeholder="Location" class="form-control input-md" wire:model.defer="location">
                              @error('location')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6 control-label">Experience</label>
                          <div class="col-md-12 {{ $errors->get('experience') ? 'has-error' : '' }}">
                              <input type="text" placeholder="Experience" class="form-control input-md" wire:model.defer="experience">
                              @error('experience')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6 control-label">Salary</label>
                          <div class="col-md-12 {{ $errors->get('price') ? 'has-error' : '' }}">
                                  <select class="form-control" wire:model.defer="price">
                                      <option value="">Add Salary</option>
                                          <option value="Confidential">Confidential</option>
                                          <option value="15,000 - 30,000">Yes</option>
                                  </select>
                                  @if($price == '15,000 - 30,000' )
                                       <input type="text" placeholder="15,000 - 30,000" class="form-control input-md mt-3" wire:model="price">
                                  @endif
                              @error('price')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6 control-label">Job Types</label>
                          <div class="col-md-12 {{ $errors->get('schedule') ? 'has-error' : '' }}">
                              <input type="text" placeholder="Job Types (Creative & Design)" class="form-control input-md" wire:model.defer="schedule">
                              @error('schedule')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6 control-label">Phone</label>
                          <div class="col-md-12 {{ $errors->get('phone') ? 'has-error' : '' }}">
                              <input type="text" placeholder="Phone Number" class="form-control input-md" wire:model="phone">
                              @error('phone')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6 control-label">Image</label>
                          <div class="col-md-12 {{ $errors->get('images') ? 'has-error' : '' }}">
                              <input type="file" class="form-control input-file" wire:model.defer="images">
                              @if($images)
                                  <img src="{{ $images->temporaryUrl() }}" width="120"/>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6 control-label">Email</label>
                          <div class="col-md-12 {{ $errors->get('email') ? 'has-error' : '' }}">
                              <input type="text" placeholder="Email" class="form-control input-md" wire:model="email">
                              @error('email')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6 control-label">Web site</label>
                          <div class="col-md-12 {{ $errors->get('web') ? 'has-error' : '' }}">
                              <input type="text" placeholder="Web Site" class="form-control input-md" wire:model="web">
                              @error('web')<p class="text-danger">{{ $message }}</p>@enderror 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="col-md-6 control-label">About the company</label>
                          <div class="col-md-12 {{ $errors->get('short_description') ? 'has-error' : '' }}" wire:ignore>
                              <textarea style="height: 100px" placeholder="Short Description" id="short_description" class="form-control" wire:model.defer="short_description"></textarea>
                              @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="col-md-6 control-label">About the job </label>
                          <div class="col-md-12" {{ $errors->get('description') ? 'has-error' : '' }} wire:ignore>
                              <textarea style="height: 100px" placeholder="Description" id="description" class="form-control" wire:model.defer="description"></textarea>
                              @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="col-md-6 control-label">Apply Url</label>
                          <div class="col-md-12 {{ $errors->get('jobUrl') ? 'has-error' : '' }}">
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
                          <div class="col-md-12 {{ $errors->get('fjob') ? 'has-error' : '' }}">
                              <select class="form-control" wire:model.defer="fjob">
                                  <option value="">Select Job Category</option>
                                      <option value="Part Time">Part Time</option>
                                      <option value="Full Time">Full Time</option>
                              </select>
                              @error('fjob')<p class="text-danger">{{ $message }}</p>@enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-6 control-label">End Date</label>
                        <div class="col-md-12 {{ $errors->get('open') ? 'has-error' : '' }}">
                            <input wire:model.defer="open"
                            type="text" class="form-control input-md datepicker" placeholder="End Date" autocomplete="off"
                            data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" data-date-today-highlight="true"                        
                            onchange="this.dispatchEvent(new InputEvent('input'))">
                        </div>
                    </div>
                </div><br/>
                  <div class="col-md-12">
                      <div class="form-group">
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
   <!-- Modal event created successfully!-->
   <div class="modal fade  popups" id="exampleModalLong" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <a href="/hookup" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body text-center">
                <h1>AWESOME!</h1>
                <p >Your job has been<br/>
                successfully submitted.</p>
                <a href="{{route('hookup.addhookup')}}" class="btn btn-successfully">
                    <i class="fa fa-plus" aria-hidden="true"></i><br/>
                    Add another</a><br/>
                <a href="/"><img class="popup_logo" src="{{ asset('assets/uploads/img/PC footer.svg')}}" width="120"/></a>
              
        </div>
      </div>
    </div>
  </div>
<!-- Modal event created successfully! end here-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type='text/javascript'>
    $('#updated-form').submit(function (e) {
          $('#exampleModalLong').modal('show');
          return false;
      });
    </script>
    <style>
    .popups .modal-content {
  position: relative;
  display: flex;
  flex-direction: column;
  width: 100%;
  pointer-events: auto;
  background-color: #333 !important;
  background-clip: padding-box;
  border: 1px solid transparent;
  border-radius: 1.2rem !important;
  outline: 0;
  }
  .popups .modal-content h1{
      font-size: 5.25rem !important;
      color: #fff;
  }
  .popups .modal-content p{
      margin-bottom: 3rem !important;
      font-size: 2.75rem !important;
      color: #fff;
  }
  .popups .modal-header .close {
      margin: 0;
      position: absolute;
      top: -7px;
      right: -26px;
      width: 23px;
      height: 23px;
      border-radius: 23px;
      background-color: transparent !important;
      background: transparent !important;
      color: #fff;
      font-size: 35px;
      opacity: 1;
      z-index: 10;
      text-align: center;
  } 
  .popups .modal-header{
      border-bottom: 1px solid #333 !important;
  }
  .popups .btn-successfully{
     width: 150px;
     height: 150px;
     background: #fff100;
     border-radius: 75px;
     color: #222 !important;
      font-size: 17px;
      text-transform: uppercase;
      line-height: 1.2em;
 }
 .popups .btn-successfully i{
     font-size: 58px;
     -webkit-text-stroke: 7px #fff100 !important;
 }
 .popups .popup_logo{
     width: 80px !important;
     margin-top: 3em;
     margin-bottom: 2em;
 }
    </style>

@livewireScripts
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
<style>
    .form-horizontal .control-label {text-align: left !important;}
</style>



