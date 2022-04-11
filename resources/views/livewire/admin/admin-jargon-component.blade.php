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
        <h4 class="mb-3 mb-md-0">All Jargons</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
          <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control">
        </div>
        <a href="{{route('admin.addjargons')}}" class="btn btn-success pull-right">Add New</a>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jargons as $jargon)
                            <tr>
                                <td>{{$jargon->id}}</td>
                                <td><img src="{{ asset('assets/images/jargons') }}/{{ $jargon->images }}" width="60"/></td>
                                <td>{!! Str::limit($jargon->name)!!}</td>
                                <td>{{$jargon->jargons_status}}</td>
                                <td>{{$jargon->jargon_categories_id}}</td>
                                <td>{{$jargon->created_at}}</td>
                                <td>
                                    <a href="{{ route('admin.editjargons',['jargon_slug'=>$jargon->slug]) }}"><i  class="fa fa-edit fa-1x"></i></a>
                                    <a href="#" onclick="confirm('Ara you sure, You want to delete this jargon') || event.stopImmediatePropagation()" wire:click.prevent="deleteJargon({{ $jargon->id }})" style="margin-left: 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$jargons->links()}}
          </div>
        </div>
      </div>
    </div> <!-- row -->