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
        <h4 class="mb-3 mb-md-0"> Edit Logo</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
          <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control">
        </div>
        <a href="{{route('admin.vectorlogos')}}" class="btn btn-success pull-right">All Logos</a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form class="form-horizontal" wire:submit.prevent="updateVector"  files="true" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-md-6 control-label">Logo Name</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="Vector Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                    </div>
                </div>
                <div class="form-group">
                <label class="col-md-6 control-label">Logo Slug</label>
                <div class="col-md-6">
                    <input type="text" placeholder="Vector Slug" class="form-control input-md" wire:model="slug"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Tags</label>
            <div class="col-md-6">
                <input type="text" placeholder="Tags (to add more tags you need to separate them with a comma)" class="form-control input-md" wire:model="vtag">
            </div>
        </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Short Description</label>
                <div class="col-md-6" wire:ignore>
                    <textarea placeholder="Short Description" id="short_description" class="form-control" wire:model="short_description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Description</label>
                <div class="col-md-6" wire:ignore>
                    <textarea placeholder="Description" id="description" class="form-control" wire:model="description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Designer</label>
                <div class="col-md-6">
                    <input type="text" placeholder="Designer" class="form-control input-md" wire:model="designer">
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
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Status</label>
                <div class="col-md-6">
                    <select class="form-control" wire:model="vector_status">
                        <option value="published">Published</option>
                        <option value="unpublished">Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Vector File</label>
                <div class="col-md-6">
                    <input type="file" class="form-control input-file" wire:model="newimage">
                    {{--@if($newimage)
                        <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                    @else
                        <img src="{{ asset('assets/images/vectors')}}/{{ $images}}" width="120"/>
                    @endif--}}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Vector Preview</label>
                <div class="col-md-6">
                    <input type="file" class="form-control input-file" wire:model="newimages">
                    @if($newimages)
                        <img src="{{ $newimages->temporaryUrl() }}" width="120"/>
                    @else
                        <img src="{{ asset('assets/images/vectors')}}/{{ $image}}" width="120"/>
                    @endif
                </div>
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
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label"></label>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div> <!-- row -->