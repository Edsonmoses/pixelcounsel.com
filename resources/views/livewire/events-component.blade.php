<div>
    <div class="events-actives"><div class="events-arrows"></div></div>
<header class="intro-header intro-events">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="heading-style">
                    <h1>EVENTS</h1>
                    <span class="sub-heading">What’s happening where and when (and if the drinks are on the house)</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 vector-s-btn">
                @if (Auth::check())
                    <a class="btn btn-events" href="{{ route('events.addevent') }}" role="button">SUBMIT AN EVENT</a>
                @else
                     <a class="btn btn-events" href="{{route('login')}}" title="Login" role="button">SUBMIT AN EVENT</a>
                @endif
            </div>
        </div>
    </div>
  </header>
  <!-- Main Content -->
  <div class="container">
    <div class="bottom-menu">
        <ul class="nav navbar-nav">
          @foreach ($eventcategories as $e_catagory )
          <li class="nav-link">
              <a href="{{ route('events.category',['category_slug'=>$e_catagory->slug]) }}">{{ $e_catagory->name}}</a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
    <div class="container">
      @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
      <div class="row" id="app">
        @foreach ($ads_events as $event )
        <a href="{{ route('events.details',['event_slug'=>$event->slug]) }}">
              <div class="col-md-3 mb-4">
                <div class="card mb-4 shadow-sm">
                    <img class="bd-placeholder-img card-img-top mb-img" src="{{ asset('assets/images/events') }}/{{ $event->images }}" alt="{{$event->name}}"  width="262" height="262">
                  <div class="card-body">
                    <div class="row  col-bb">
                        <div class="col-sm-8 col-infos">
                          <a href="#" role="button" data-toggle="modal" data-target="#eventModal_{{$event->id}}"><h2 class="card-title" >{{$event->name}}</h2></a>
                            <p class="card-text">{{substr($event->short_description,0,51)}}</p>
                        </div>
                        <div class="col-sm-2 col-dates">
                            <p class="dates">{{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D') }}</p>
                            <p class="months">{{\Carbon\Carbon::parse($event->eventdate)->isoFormat('MMM') }}</p>
                            <p class="years">{{\Carbon\Carbon::parse($event->eventdate)->isoFormat('Y') }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="footer-title">{{$event->exhibition}} {{$event->id}}</p>
                    </div>
                  </div>
                </div>
              </div>
        </a>
        @endforeach
        <a href="#">
          <div class="col-md-3 mb-4">
            <div class="card mb-4 shadow-sm">
              <img class="bd-placeholder-img card-img-top mb-img" src="{{ asset('assets/images/events/eventholder.jpg') }}" alt=""  width="262" height="415" style="border-bottom-left-radius: 20px; border-bottom-right-radius:20px;">
              <div class="card-body" style="background:none;">
              </div>
            </div>
          </div>
    </a>
       
        @foreach ($events as $event )
        @if ($event->id == $loop->first || $event->id == 1 || $event->id == 2)

        @else
        <a href="{{ route('events.details',['event_slug'=>$event->slug]) }}">
              <div class="col-md-3 mb-4">
                <div class="card mb-4 shadow-sm">
                    <img class="bd-placeholder-img card-img-top mb-img" src="{{ asset('assets/images/events') }}/{{ $event->images }}" alt="{{$event->name}}"  width="262" height="262">
                  <div class="card-body">
                    <div class="row  col-bb">
                        <div class="col-sm-8 col-infos">
                          <a href="#" role="button" data-toggle="modal" data-target="#eventModal_{{$event->id}}"><h2 class="card-title" >{{$event->name}}</h2></a>
                            <p class="card-text">{{substr($event->short_description,0,51)}}</p>
                        </div>
                        <div class="col-sm-2 col-dates">
                            <p class="dates">{{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D') }}</p>
                            <p class="months">{{\Carbon\Carbon::parse($event->eventdate)->isoFormat('MMM') }}</p>
                            <p class="years">{{\Carbon\Carbon::parse($event->eventdate)->isoFormat('Y') }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="footer-title">{{$event->exhibition}}</p>
                    </div>
                  </div>
                </div>
              </div>
        </a>
        @endif
        @endforeach
        
        </div>
        
    
              <!-- The Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="EventsModal" wire:ignore.self>
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create your event</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                 <!-- <div class="box-header with-border">
                    <h3 class="box-title">Titles</h3>
                  </div>-->
                  <!-- /.box-header -->
                  <!-- form start -->
                  @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                  <form class="form-horizontal" wire:submit.prevent="addEvent">
                    {{ csrf_field() }}
                    <div class="box-body">
                      <div class="row">
                      <div class="col-md-11" style="margin: 0 35px 0 15px !important">
                        <div class="form-group">
                          <label for="exhibition">Event Venue</label>
                          <input type="text" placeholder="Event Venue" class="form-control input-md" wire:model="exhibition">
                        </div>
                        <div class="form-group">
                          <label for="name">Event Name</label>
                          <input type="text" placeholder="Event Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                        </div>
                        <div class="form-group" style="display: none">
                          <label for="slug">Event Slug</label>
                          <input type="text" placeholder="Event Slug" class="form-control input-md" wire:model="slug"/>
                        </div>
                        <div class="form-group">
                          <label for="description">Event Description</label>
                          <textarea placeholder="Event Description" class="form-control" style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" wire:model="description"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="events_categories_id">Event Category</label>
                          <select class="form-control" wire:model="events_categories_id">
                            <option value="">Select Event Category</option>
                            @foreach ( $eventcategories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="etype_id">Event Type</label>
                          <select class="form-control" wire:model="etype_id">
                            <option value="">Select Event Type</option>
                            @foreach ( $eventtypes as $etype )
                                <option value="{{ $etype->id }}">{{ $etype->name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                          <label for="econtact">Event Contact Person's Name</label>
                          <input type="text" placeholder="Event Contact Person's Name" class="form-control input-md" wire:model="econtact">
                      </div>
                      <div class="form-group">
                        <label for="eventemail">Event Contact Email</label>
                        <input type="text" placeholder="Event Contact Email" class="form-control input-md" wire:model="eventemail">
                    </div>
                    <div class="form-group">
                      <label for="ephone">Phone Number</label>
                      <input type="text" placeholder="Phone Number" class="form-control input-md" wire:model="ephone">
                     </div>
                     <div class="form-group">
                      <label for="website">Website</label>
                      <input type="text" placeholder="Website" class="form-control input-md" wire:model="website">
                     </div>
                     <div class="form-group">
                      <label for="ticket">Ticket Price/Entrance Fee</label>
                      <input type="text" placeholder="Ticket Price" class="form-control input-md" wire:model="ticket">
                     </div>
                      <div class="form-group">
                          <label for="Image">Event Poster</label>
                          <input type="file" class="form-control input-file" wire:model="images">
                          @if($images)
                              <img src="{{ $images->temporaryUrl() }}" width="120"/>
                          @else
                              <img src="{{ asset('assets/images/events')}}/{{ $event->images }}" width="120"/>
                          @endif
                      </div>
                      <div class="form-group"  id="sandbox-containers">
                        <label for="eventdate">Event Start Date & Time</label>
                        <input wire:model="eventdate"
                          type="text" class="form-control input-md datepicker" placeholder="Event Start Date & Time" autocomplete="off"
                          data-provide="datepicker" data-datetime-autoclose="true" data-datetime-format="dd-mm-yyyy" data-date-today-highlight="true"                        
                          onchange="this.dispatchEvent(new InputEvent('input'))">
                      </div>
                      <div class="form-group"  id="sandbox-containers">
                        <label for="enddate">Event End Date & Time</label>
                        <input wire:model="enddate"
                          type="text" class="form-control input-md datepicker" placeholder="Event End Date & Time" autocomplete="off"
                          data-provide="datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" data-date-today-highlight="true"                        
                          onchange="this.dispatchEvent(new InputEvent('input'))">
                      </div>
                      <div class="form-group">
                        <label for="short_description">Event Ticketing Details</label>
                        <textarea placeholder="Ticket Details:for each ticket type include name, start & end date for sale max ticket if inclusive and cost" class="form-control" style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" wire:model="short_description"></textarea>
                       </div>
                      <br/><br/>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">
                      <br/>
                      <input type="submit" class="btn btn-primary" value="Submit an event">
                      <a href='/events' class="btn btn-warning">Back</a>
                    </div>
                  </form>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col-->
            </div>
            <!-- ./row -->
          </section>
  <!-- /.content -->
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--model popup-->
</div>
</div>
