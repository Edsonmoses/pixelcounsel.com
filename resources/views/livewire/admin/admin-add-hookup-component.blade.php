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
          <div class="form-group">
              <label class="col-md-6 control-label">Hookup Name</label>
              <div class="col-md-6">
                  <input type="text" placeholder="Hookup Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                  @error('name')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
          </div>
          <div class="form-group">
            <label class="col-md-6 control-label">Hookup Slug</label>
            <div class="col-md-6">
                <input type="text" placeholder="Hookup Slug" class="form-control input-md" wire:model="slug"/>
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
                @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-6 control-label">Company</label>
            <div class="col-md-6">
                <input type="text" placeholder="Company" class="form-control input-md" wire:model="company">
                @error('company')<p class="text-danger">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-6 control-label">Job</label>
            <div class="col-md-6">
                <input type="text" placeholder="Job" class="form-control input-md" wire:model="jobtitle">
                @error('jobtitle')<p class="text-danger">{{ $message }}</p>@enderror
            </div>
        </div><div class="form-group">
            <label class="col-md-6 control-label">Location</label>
            <div class="col-md-6">
                <input type="text" placeholder="Location" class="form-control input-md" wire:model="location">
                @error('location')<p class="text-danger">{{ $message }}</p>@enderror 
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-6 control-label">Status</label>
            <div class="col-md-6">
                <select class="form-control" wire:model="hookup_status">
                    <option value="published">Published</option>
                    <option value="unpublished">Unpublished</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-6 control-label">Image</label>
            <div class="col-md-6">
                <input type="file" class="form-control input-file" wire:model="images">
                @if($images)
                    <img src="{{ $images->temporaryUrl() }}" width="120"/>
                @else
                   <img src="{{ asset('assets/images/hookups')}}/{{ $images }}" width="120"/>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-6 control-label">Hookup Category</label>
            <div class="col-md-6">
                <select class="form-control" wire:model="hookup_categories_id">
                    <option value="">Select Hookup Category</option>
                    @foreach ( $hookupcategories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('hookup_categories_id')<p class="text-danger">{{ $message }}</p>@enderror
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


