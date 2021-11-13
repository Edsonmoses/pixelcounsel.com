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
        <h4 class="mb-3 mb-md-0">Add New Vector</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
          <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control">
        </div>
        <a href="{{route('admin.vectorlogos')}}" class="btn btn-success pull-right">All Vectors</a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form class="form-horizontal" wire:submit.prevent="addVector" files="true" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-md-6 control-label">Vector Name</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="Vector Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                        @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Vector Slug</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="Vector Slug" class="form-control input-md" wire:model="slug"/>
                        @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Short Description</label>
                    <div class="col-md-6" wire:ignore>
                        <textarea placeholder="Short Description" id="short_description" class="form-control" wire:model="short_description"></textarea>
                        @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Description</label>
                    <div class="col-md-6" wire:ignore>
                        <textarea placeholder="Description" id="description" class="form-control" wire:model="description"></textarea>
                        @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Designer</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="Designer" class="form-control input-md" wire:model="designer">
                        @error('designer')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Format</label>
                    <div class="col-md-6">
                        <select class="form-control" wire:model="format">
                            <option value="ai">AI</option>
                            <option value="eps">EPS</option>
                            <option value="pdf">PDF</option>
                        </select>
                        @error('format')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Status</label>
                    <div class="col-md-6">
                        <select class="form-control" wire:model="vector_status">
                            <option value="published">Published</option>
                            <option value="unpublished">Unpublished</option>
                        </select>
                        @error('vector_status')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Vector File</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control input-file" wire:model="images">
                        @error('images')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Vector Preview</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control input-file" wire:model="image">
                        @if($image)
                            <img src="{{ $image->temporaryUrl() }}" width="120"/>
                        @else
                            <img src="{{ asset('assets/images/placesholder.jpg')}}" width="120"/>
                        @endif
                    </div>
                <div class="form-group">
                    <label class="col-md-6 control-label">Vector Category</label>
                    <div class="col-md-6">
                        <select class="form-control" wire:model="vector_categories_id">
                            <option value="">Select Vector Category</option>
                            @foreach ( $vectorcategories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('vector_categories_id')<p class="text-danger">{{ $message }}</p>@enderror
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
    </div> <!-- row -->
