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
        <h4 class="mb-3 mb-md-0">All Categories</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
          <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control">
        </div>
        <a href="{{route('admin.addhookup')}}" class="btn btn-success pull-right">Add New</a>
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
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Date Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hookups as $hookup)
                        <tr>
                            <td>{{$hookup->id}}</td>
                            <td style="width: 15%">{{$hookup->name}}</td>
                            <td>{{$hookup->slug}}</td>
                            <td style="width: 15%">{{$hookup->created_at}}</td>
                            <td>
                                <a href="{{ route('admin.edithookup',['hookup_slug'=>$hookup->slug]) }}"><i  class="fa fa-edit fa-1x"></i></a>
                                <a href="#" onclick="confirm('Ara you sure, You want to delete this hookup category') || event.stopImmediatePropagation()" wire:click.prevent="deleteHookup({{ $hookup->id }})" style="margin-left: 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
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
     <script>
      function toggle(source) {
          var checkboxes = document.querySelectorAll('input[type="checkbox"]');
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i] != source)
                  checkboxes[i].checked = source.checked;
          }
      }
    </script>