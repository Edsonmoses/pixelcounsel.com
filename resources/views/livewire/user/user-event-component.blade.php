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
                                            <th>Event Image</th>
                                            <th>Event Name</th>
                                            <th>Created Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($events as $event )
                                              <tr>
                                                  <td>{{ $event->id }}</td>
                                                  <td><img src="{{ asset('assets/images/events') }}/{{ $event->images }}" class="rounded-circle" width="30" height="30"/></td>
                                                  <td>{{ $event->name }}</td>
                                                  <td>{{ $event->created_at }}</td>
                                                  @if ($event->events_status == 'published')
                                                  <td><span class="badge bg-success">Approved</span></td>
                                                  <td>
                                                      <a href="{{ route('user.evedit',['event_slug'=>$event->slug]) }}"><i  class="fas fa-edit"></i></a>
                                                  </td>
                                                  @else
                                                  <td><span class="badge bg-pink">Pending</span></td>
                                                  <td>
                                                      <a href="{{ route('user.evedit',['event_slug'=>$event->slug]) }}"><i  class="fas fa-edit"></i></a>
                                                      <a href="#" onclick="confirm('Ara you sure, You want to delete this event') || event.stopImmediatePropagation()" wire:click.prevent="deleteEvent({{ $event->id }})" style="margin-left: 10px"><i class="fas fa-trash fa-1x text-danger"></i></a>
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