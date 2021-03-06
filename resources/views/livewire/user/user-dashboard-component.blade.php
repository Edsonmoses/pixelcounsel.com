<div>
    <div class="page-content">
        <style>
            nav svg{
                height: 10px;
            }
            nav .hidden{
                display: block !important;
            }
            .bg-white {
                    --bs-bg-opacity: 1;
                    background-color: transparent !important;
            }
            .border {
                border: none !important;
            }
            [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
                cursor: pointer;
                color: white;
            }
        </style>
  <div class="content-page">
      <div class="content">

          <!-- Start Content-->
          <div class="container-fluid">

              <div class="row">

                  <div class="col-xl-3 col-md-6">
                      <div class="card">
                          <div class="card-body">

                              <h4 class="header-title mt-0 mb-4">Approved Items</h4>

                              <div class="widget-chart-1">
                                  <div class="widget-chart-box-1 float-start" dir="ltr">
                                      <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                              data-bgColor="#F9B9B9" value="57"
                                              data-skin="tron" data-angleOffset="180" data-readOnly=true
                                              data-thickness=".15"/>
                                  </div>

                                  <div class="widget-detail-1 text-end">
                                      <h2 class="fw-normal pt-2 mb-1"> {{ $approved }} </h2>
                                      <p class="text-muted mb-1">Approved today</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div><!-- end col -->

                  <div class="col-xl-3 col-md-6">
                      <div class="card">
                          <div class="card-body">
                            @php
                            $totalp = $pending;
                            @endphp
                              <h4 class="header-title mt-0 mb-3">Pending Items</h4>
                              @php $totalp = $totalp-($totalp/100); @endphp
                              <div class="widget-box-2">
                                  <div class="widget-detail-2 text-end">
                                      <span class="badge bg-success rounded-pill float-start mt-3">{{$totalp}}% <i class="mdi mdi-trending-up"></i> </span>
                                      <h2 class="fw-normal mb-1"> {{$pending}} </h2>
                                      <p class="text-muted mb-3">Pending today</p>
                                  </div>
                                  <div class="progress progress-bar-alt-success progress-sm">
                                      <div class="progress-bar bg-success" role="progressbar"
                                              aria-valuenow="{{$pending}}" aria-valuemin="0" aria-valuemax="100"
                                              style="width: {{$totalp}}%;">
                                          <span class="visually-hidden">{{$totalp}}% Complete</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div><!-- end col -->

                  <div class="col-xl-3 col-md-6">
                      <div class="card">
                          <div class="card-body">

                              <h4 class="header-title mt-0 mb-4">Your most downloaded Logo </h4>

                              <div class="widget-chart-1">
                                  <div class="widget-chart-box-1 float-start" dir="ltr">
                                      <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                              data-bgColor="#FFE6BA" value="{{ $mvectors }}"
                                              data-skin="tron" data-angleOffset="{{ $mvectors }}" data-readOnly=true
                                              data-thickness=".15"/>
                                  </div>
                                  <div class="widget-detail-1 text-end">
                                      <h2 class="fw-normal pt-2 mb-1"> {{ $mvectors }} </h2>
                                      <p class="text-muted mb-1">Logo today</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div><!-- end col -->

                  <div class="col-xl-3 col-md-6">
                      <div class="card">
                          <div class="card-body">

                              <h4 class="header-title mt-0 mb-3">Open Jobs</h4>

                              <div class="widget-box-2">
                                @php
                                $total = $count;
                                $ptotal = $count;
                                @endphp
                                  <div class="widget-detail-2 text-end">
                                      <span class="badge bg-pink rounded-pill float-start mt-3">
                                        @php $total = $total-($total/100); @endphp
                                          {{ $total }}% <i class="mdi mdi-trending-up"></i> </span>
                                      <h2 class="fw-normal mb-1"> {{ $count }} </h2>
                                      <p class="text-muted mb-3">Open Jobs today</p>
                                  </div>
                                  <div class="progress progress-bar-alt-pink progress-sm">
                                    @php $total = $ptotal-($total/100); @endphp
                                      <div class="progress-bar bg-pink" role="progressbar"
                                              aria-valuenow="{{ $total }}" aria-valuemin="0" aria-valuemax="100"
                                              style="width: {{ $total }}%;">
                                             
                                          <span class="visually-hidden">{{ $total }}% Complete</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                  </div><!-- end col -->

              </div>
              <!-- end row -->
              <div class="row">
                  <div class="col-xl-12">
                      <div class="card">
                          <div class="card-body">

                              <h4 class="header-title mt-0 mb-3">Latest Logos</h4>

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
                                                <td style="width: 15%">{{ $vector->name }}</td>
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
                                                    <a href="{{ route('user.vecedit',['vector_slug'=>$vector->slug]) }}"><i  class="fas fa-edit"></i></a>
                                                    <a href="#" onclick="confirm('Ara you sure, You want to delete this logo') || event.stopImmediatePropagation()" wire:click.prevent="deleteVector({{ $vector->id }})" style="margin-left: 10px"><i class="fas fa-trash fa-1x text-danger"></i></a>
                                                </td>
                                                @endif
                                            </tr>
                                          @endforeach

                                      </tbody>
                                  </table>
                                  {{$vectors->links()}}
                              </div>
                          </div> 
                      </div>
                      
                  </div><!-- end col -->
                  <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mt-0 mb-3">Latest Jobs</h4>

                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Logo</th>
                                        <th>Job Name</th>
                                        <th>Created Date</th>
                                        <th>Company</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($jobs as $job )
                                          <tr>
                                              <td>{{ $job->id }}</td>
                                              <td><img src="{{ asset('assets/images/hookups') }}/{{ $job->images }}" class="rounded-circle" width="30" height="30"/></td>
                                              <td style="width: 15%">{{ $job->name }}</td>
                                              <td>{{ $job->created_at }}</td>
                                              <td style="width: 15%">{{ $job->company }}</td>
                                              @if ($job->hookup_status == 'published')
                                              <td><span class="badge bg-success">Approved</span></td>
                                              <td>
                                                <a href="{{ route('user.hookedit',['hookup_slug'=>$job->slug]) }}"><i  class="fas fa-edit"></i></a>
                                            </td>
                                              @else
                                              <td><span class="badge bg-pink">Pending</span></td>
                                              <td>
                                                <a href="{{ route('user.hookedit',['hookup_slug'=>$job->slug]) }}"><i  class="fas fa-edit"></i></a>
                                                <a href="#" onclick="confirm('Ara you sure, You want to delete this job') || event.stopImmediatePropagation()" wire:click.prevent="deleteVector({{ $job->id }})" style="margin-left: 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
                                            </td>
                                              @endif
                                          </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{$jobs->links()}}
                            </div>
                        </div> 
                    </div>
                    
                </div><!-- end col -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mt-0 mb-3">Latest Events</h4>

                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Event Image</th>
                                        <th>Event Name</th>
                                        <th>Closing Date</th>
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
                                              <td style="width: 15%">{{ $event->name }}</td>
                                              <td>{{ $event->enddate }}</td>
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
                                                <a href="#" onclick="confirm('Ara you sure, You want to delete this event') || event.stopImmediatePropagation()" wire:click.prevent="deleteEvent({{ $event->id }})" style="margin-left: 10px"><i class="fa fa-trash fa-1x text-danger"></i></a>
                                            </td>
                                              @endif
                                          </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{$events->links()}}
                            </div>
                        </div> 
                    </div>
                    
                </div><!-- end col -->

              </div>
              <!-- end row -->       
              
          </div> <!-- container-fluid -->

      </div> <!-- content -->
</div>