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
                                <form class="form-horizontal" wire:submit.prevent="updateVector">
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
                                                    <label for="designer" class="form-label">Designer</label>
                                                    <input type="text" placeholder="{{ Auth::user()->name }}" id="designer" disabled=""  class="form-control" wire:model="designer">
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
                                                    @if($newimages)
                                                        <img src="{{ $newimages->temporaryUrl() }}" width="120"/>
                                                    @else
                                                        <img src="{{ asset('assets/images/vectors')}}/{{ $image}}" width="120"/>
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
                                    <button type="submit" class="btn btn-success pull-right">Update a vector</button>
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
     
  