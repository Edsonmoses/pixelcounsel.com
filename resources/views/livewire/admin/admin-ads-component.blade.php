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
        <h4 class="mb-3 mb-md-0">All Ads</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
          <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control">
        </div>
        <a href="{{route('admin.add_ads')}}" class="btn btn-success pull-right">Add New</a>
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
                                    <th>Ad Name</th>
                                    <th>Ad Position</th>
                                    <th>Ad Image</th>
                                    <th>Ad Start Date</th>
                                    <th>Ad End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($adverts as $advert)
                                    <tr>
                                        <td>{{$advert->id}}</td>
                                        <td>{{$advert->name}}</td>
                                        <td>
                                          @if ($advert->position == 1)
                                            Position Top
                                          @elseif ($advert->position == 2)
                                            Position Left
                                          @elseif ($advert->position == 3)
                                            Position Right
                                          @elseif ($advert->position == 4)
                                            Position Bottom
                                          @else
                                            No Position Selected
                                          @endif
                                        </td>
                                        <td><img src="{{ asset('assets/images/advertis') }}/{{$advert->image}}" width="60"/></td>
                                        <td>{{$advert->startdate}}</td>
                                        <td>{{$advert->endate}}</td>
                                        <td>
                                            <a href="{{ route('admin.edit_ads',['name'=>$advert->name]) }}"><i  class="fa fa-edit fa-1x"></i></a>
                                            <a href="#" onclick="confirm('Ara you sure, You want to delete this ad') || event.stopImmediatePropagation()" wire:click.prevent="deleteAds({{ $advert->id }})" style="margin-left: 10px"><i class="fa fa-times fa-1x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$adverts->links()}}
          </div>
        </div>
      </div>
    </div> <!-- row -->
