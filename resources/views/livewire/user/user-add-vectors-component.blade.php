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
                                <form class="form-horizontal" id="updated-form" wire:submit.prevent="addVector">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Logo Name</label>
                                                <input type="text" placeholder="Logo Name" id="name" class="form-control" wire:model="name" wire:keyup="generateSlug">
                                                @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="slug" class="form-label"> Logo Slug</label>
                                                <input type="text" placeholder="Logo Slug (url)" id="slug" class="form-control" wire:model="slug">
                                                @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="format" class="form-label">Logo Format</label>
                                                <select class="form-select" wire:model="format">
                                                    <option value="ai">AI</option>
                                                    <option value="eps">EPS</option>
                                                    <option value="pdf">PDF</option>
                                                </select>
                                                @error('format')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="designer" class="form-label">Logo Designer</label>
                                                    <input type="text" placeholder="Unknown" id="designer" disabled=""  class="form-control" wire:model="designer">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="vtag" class="form-label">Tags</label>
                                                    <input type="text" placeholder="Tags (to add more tags you need to separate them with a comma)" id="vtag" class="form-control"  wire:model="vtag">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="vector_categories_id" class="form-label"> Company Business Category</label>>
                                                    <select class="form-select" id="vector_categories_id" wire:model="vector_categories_id">
                                                        <option value="">Select company business category</option>
                                                        @foreach ( $vectorcategories as $category )
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('vector_categories_id')<p class="text-danger">{{ $message }}</p>@enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="images" class="form-label">Vector File</label>
                                                    <input type="file" id="images" class="form-control" wire:model="images">
                                                    @error('images')<p class="text-danger">{{ $message }}</p>@enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Logo Preview</label>
                                                    <input type="file" id="mage" class="form-control" wire:model="image">
                                                    @if($image)
                                                    <img src="{{ $image->temporaryUrl() }}" width="120"/>
                                                    @endif
                                                    @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                                                </div>
                                            </div>
                                          <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="short_description" class="form-label">Short Description</label>
                                                <textarea class="form-control" placeholder="Short Description" id="short_description" rows="5" wire:model="short_description"></textarea>
                                                @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                        </div>
                                         <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="example-textarea" class="form-label">Vector Description</label>
                                                <textarea class="form-control" placeholder="Vector Description" id="description" rows="5"  wire:model="description"></textarea>
                                                @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                        </div>
                                    </div><!--row-->
                                    <button type="submit" class="btn btn-success pull-right">Post a vector</button>
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
          
    <!-- Modal event created successfully!-->
    <div class="modal fade  popups" id="exampleModalLong" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <a href="{{route('user.vectors')}}" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body text-center">
                <h1>AWESOME!</h1>
                <p >Your logo has been<br/>
                 successfully submitted.</p>
                <a href="{{route('user.vecadd')}}" class="btn btn-successfully">
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
    $(document).ready(function(){
       $('#updated-form').submit(function (e) {
              $('#exampleModalLong').modal('show');
              return false;
          });
        });
        </script>
  