<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
        <h4 class="mb-3 mb-md-0">Add Category</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
          <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control">
        </div>
        <a href="{{route('admin.alpfilter')}}" class="btn btn-success pull-right">All Atributes</a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
                <style>
                    nav svg{
                        height: 20px;
                    }
                    nav .hidden{
                        display: block !important;
                    }
                </style>
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                      <form class="form-horizontal" wire:submit.prevent="storeAlpfilter">
                          <div class="form-group">
                              <label class="col-md-6 control-label">Atribute Name</label>
                              <div class="col-md-6">
                                  <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name"/>
                                  @error('name')<p class="text-danger">{{ $message }}</p>@enderror
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
    </div><!-- row -->

