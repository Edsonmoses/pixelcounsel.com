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
                                <select class="form-control input-md" wire:model="name">
                                  <option value="0">None</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                  <option value="E">E</option>
                                  <option value="F">F</option>
                                  <option value="G">G</option>
                                  <option value="H">H</option>
                                  <option value="H">H</option>
                                  <option value="I">I</option>
                                  <option value="J">J</option>
                                  <option value="K">K</option>
                                  <option value="L">L</option>
                                  <option value="M">M</option>
                                  <option value="N">N</option>
                                  <option value="O">O</option>
                                  <option value="P">P</option>
                                  <option value="Q">Q</option>
                                  <option value="R">R</option>
                                  <option value="S">S</option>
                                  <option value="T">T</option>
                                  <option value="U">U</option>
                                  <option value="V">V</option>
                                  <option value="W">W</option>
                                  <option value="X">X</option>
                                  <option value="Y">Y</option>
                                  <option value="Z">Z</option>
                                </select>
                                  @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-6 control-label">Parent Category</label>
                            <div class="col-md-6">
                                <select class="form-control input-md" wire:model="category_id">
                                  <option value="0">None</option>
                                  @foreach ($categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
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

