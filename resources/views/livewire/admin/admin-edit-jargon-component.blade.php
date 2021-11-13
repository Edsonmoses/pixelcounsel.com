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
        <h4 class="mb-3 mb-md-0">Edit Jargon</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
          <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control">
        </div>
        <a href="{{route('admin.jargon')}}" class="btn btn-success pull-right">All Jargons</a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form class="form-horizontal" wire:submit.prevent="updateJargon">
                <div class="form-group">
                    <label class="col-md-6 control-label">Jargon Name</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="Jargon Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                    </div>
                </div>
                <div class="form-group">
                <label class="col-md-6 control-label">Jargon Slug</label>
                <div class="col-md-6">
                    <input type="text" placeholder="Jargon Slug" class="form-control input-md" wire:model="slug"/>
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
                <label class="col-md-6 control-label">Status</label>
                <div class="col-md-6">
                    <select class="form-control" wire:model="jargons_status">
                        <option value="published">Published</option>
                        <option value="unpublished">Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Image</label>
                <div class="col-md-6">
                    <input type="file" class="form-control input-file" wire:model="newimage">
                    @if($newimage)
                        <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                    @else
                        <img src="{{ asset('assets/images/jargons')}}/{{ $images }}" width="120"/>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Jargon Category</label>
                <div class="col-md-6">
                    <select class="form-control" wire:model="jargon_categories_id">
                        <option value="">Select Jargon Category</option>
                        @foreach ( $jargoncategories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-6 control-label">Atribute</label>
              <div class="col-md-6">
                  <select class="form-control" wire:model="afid">
                      <option value="">Select Atribute</option>
                      @foreach ( $alpfilters as $alpf )
                          <option value="{{ $alpf->id }}">{{ $alpf->name }}</option>
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