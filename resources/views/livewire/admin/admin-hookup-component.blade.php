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
        <h4 class="mb-3 mb-md-0">All Hookups</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
          <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control">
        </div>
        <a href="{{route('admin.addhookups')}}" class="btn btn-success pull-right">Add New</a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                         <th>Created by</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hookups as $hookup)
                        <tr>
                            <td>{{$hookup->id}}</td>
                            <td>{{$hookup->name}}</td>
                            <td>{{$hookup->postedby}}</td>
                            <td>{{$hookup->location}}</td>
                            <td>{{$hookup->hookup_status}}</td>
                            <td><img src="{{ asset('assets/images/hookups') }}/{{ $hookup->images }}" width="60"/></td>
                            <td>{{$hookup->created_at}}</td>
                            <td>
                                <a href="{{ route('admin.edithookups',['hookup_slug'=>$hookup->slug]) }}"><i  class="fa fa-edit fa-1x"></i></a>
                                <a href="#" onclick="confirm('Ara you sure, You want to delete this hookup') || event.stopImmediatePropagation()" wire:click.prevent="deleteVector({{ $hookup->id }})" style="margin-left: 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$hookups->links()}}
          </div>
        </div>
      </div>
    </div> <!-- row -->