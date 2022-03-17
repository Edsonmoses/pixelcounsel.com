<div>
    <div class="vector-active"><div class="arrows"></div></div>
<header class="intro-header intro-header-vector">
    <div class="container">
        <div class="row  header-0">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <div class="heading-style">
                    <h1>VECTOR LOGOS</h1>
                    <span class="sub-heading">Online vector logo collection of brands in Africa</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 vector-s-btn">
                @if (is_null(Auth::user()->confirm_status_at))
                   <a class="btn btn-vector v-single" href="{{route('user.confirmation')}}" title="confirmation" role="button">SUBMIT A LOGO</a>
                @else
                      @if (Auth::check())
                        <a class="btn btn-vector v-single" href="{{route('vector.addvectors')}}" role="button">SUBMIT A LOGO</a>
                        @else
                        <a class="btn btn-vector v-single" href="{{route('login')}}" title="Login" role="button">SUBMIT A LOGO</a>
                        @endif
                  @endif
            </div>
        </div>
    </div>
</header>
<header class="intro-header intro-header-vector-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
              <div id="custom-search-input" style="margin-top: 33px">
                <div class="input-group col-md-12">
                    <input type="text" class="  search-query form-control" placeholder="Find a logo"  wire:model="searchTerm"/>
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button">
                            <span class=" glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>
            </div>
            <div class="col-lg-6 col-md-6 vector-s-btn text-right">
            
            </div>
            
        </div>
    </div>
</header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="rounded shadows bg-white p-4">
                    <div class="custom-form" style="margin: 0 35px 0 15px !important">
                        @if (Session::has('message'))
                                <div class="alert alert-success float-left" id="message3" role="alert">{{ Session::get('message') }}</div>
                             @endif
                        <form class="form-horizontal" id="updated-form" wire:submit.prevent="addVector" files="true" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Logo Name</label>
                                        <input type="text" placeholder="Logo Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                                         @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Logo Slug</label>
                                        <input type="text" placeholder="Logo Slug (url)" class="form-control input-md" wire:model="slug"/>
                                        @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Short Description</label>
                                        <textarea placeholder="Short Description" id="short_description" class="form-control" wire:model="short_description"></textarea>
                                        @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Logo Format</label>
                                        <select class="form-control" wire:model="format">
                                            <option value="ai">AI</option>
                                            <option value="eps">EPS</option>
                                            <option value="pdf">PDF</option>
                                        </select>
                                        @error('format')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Logo Designer</label>
                                        <input type="text" placeholder="Unknown" class="form-control input-md" wire:model="designer">
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group app-label mt-2">
                                    <label class="text-muted">Tags</label>
                                    <input type="text" placeholder="Tags (to add more tags you need to separate them with a comma)" class="form-control input-md" wire:model="vtag">
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Vector File</label>
                                        <input type="file" class="form-control input-file" wire:model="images">
                                        @error('images')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Logo Preview</label>
                                        <input type="file" class="form-control input-file" wire:model="image">
                                        @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120"/>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Company Business Category</label>
                                        <select class="form-control" wire:model="vector_categories_id">
                                            <option value="">Select company business category</option>
                                            @foreach ( $vectorcategories as $category )
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('vector_categories_id')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Vector Description</label>
                                        <textarea placeholder="Vector Description" id="description" class="form-control" wire:model="description"></textarea>
                                        @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mt-2">
                                    <button type="submit" class="btn btn-primary">Post a vector</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- Modal event created successfully!-->
    <div class="modal fade  popups" id="exampleModalLong" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <a href="{{route('"/vector')}}" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body text-center">
                <h1>AWESOME!</h1>
                <p >Your logo has been<br/>
                 successfully submitted.</p>
                <a href="{{route('vector.addvectors')}}" class="btn btn-successfully">
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
    .modal-header .close {
            margin: 0;
            position: absolute;
            top: -10px;
            right: -10px;
            width: 23px;
            height: 23px;
            border-radius: 23px;
            background-color: #313844;
            color: #fff;
            font-size: 16px;
            opacity: 1;
            z-index: 10;
            text-align: center;
        } 
    </style>

@push('scripts')
<script type= text/javascript>
 /* $(function() {
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
  });*/
  
</script>
@endpush 