<div>
    <div class="content-page">
        <div class="content">
  
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
  
                                <h4 class="header-title mt-0 mb-3">All Logos</h4>
  
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Logo</th>
                                            <th>Logo Name</th>
                                            <th>Created Date</th>
                                            <th>Format</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($vectors as $vector )
                                              <tr>
                                                  <td>{{ $vector->id }}</td>
                                                  <td><img src="{{ asset('assets/images/vectors') }}/{{ $vector->image }}" class="rounded-circle" width="30" height="30"/></td>
                                                  <td>A{{ $vector->name }}</td>
                                                  <td>{{ $vector->created_at }}</td>
                                                  <td>{{ $vector->format }}</td>
                                                  @if ($vector->vector_status == 'published')
                                                  <td><span class="badge bg-success">Approved</span></td>
                                                  <td>
                                                      <a href="{{ route('user.vecedit',['vector_slug'=>$vector->slug]) }}"><i  class="fas fa-edit"></i></a>
                                                  </td>
                                                  @else
                                                  <td><span class="badge bg-pink">Pending</span></td>
                                                  <td>
                                                      <a href="{{ route('user.vecedit',['vector_slug'=>$vector->slug]) }}"><i  class="fas fa-edit"></i> 2</a>
                                                      <a href="#" onclick="confirm('Ara you sure, You want to delete this logo') || event.stopImmediatePropagation()" wire:click.prevent="deleteVector({{ $vector->id }})" style="margin-left: 10px"><i class="fas fa-trash fa-1x text-danger"></i></a>
                                                  </td>
                                                  @endif
                                              </tr>
                                            @endforeach
  
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div><!-- end col -->
  
                </div>
                <!-- end row -->       
                
            </div> <!-- container-fluid -->
  
        </div> <!-- content -->
  </div>