<div>
    <div class="events-actives"><div class="events-arrows"></div></div>
<header class="intro-header intro-events">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="heading-style">
                    <h1>EVENTS</h1>
                    <span class="sub-heading">What’s happening where and when (and if the drinks are on the house</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 vector-s-btn">
                <a class="btn btn-events" href="#" role="button" data-toggle="modal" data-target="#EventsModal">SUBMIT AN EVENT</a>
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
        @foreach ($events as $event )
              <div class="col-md-4 mb-4">
                <div class="card mb-4 shadow-sm">
                    <img class="bd-placeholder-img card-img-top mb-img" src="{{ asset('assets/images/events') }}/{{ $event->images }}" alt="{{$event->name}}"  width="100%" height="400"  data-toggle="modal" data-target="#eventModal_{{$event->id}}">
                  <div class="card-body">
                    <div class="row  col-bb">
                        <div class="col-sm-8">
                          <a href="#" role="button" data-toggle="modal" data-target="#eventModal_{{$event->id}}"><h2 class="card-title" >{{$event->name}}</h2></a>
                            <p class="card-text">{{substr($event->short_description,0,103)}}</p>
                        </div>
                        <div class="col-sm-2 col-dates">
                            <p class="dates">{{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D') }}</p>
                            <p class="months">{{\Carbon\Carbon::parse($event->eventdate)->isoFormat('MMM') }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="footer-title">{{$event->exhibition}}</p>
                    </div>
                  </div>
                </div>
              </div>
            
            <!-- View Modal--> 
        
            <div class="modal fade events-popup" id="eventModal_{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <img class="bd-placeholder-img" src="{{ asset('assets/images/events') }}/{{ $event->images }}" alt="{{$event->name}}">
                      </div>
                      <!--left col-lg-6 col-md-6-->
                      <div class="col-lg-6 col-md-6">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div class="row">
                              <div class="col-lg-10 col-md-10">
                                  <h3 class="modal-title" style="text-transform: capitalize" id="myModalLabel">{{$event->name}}</h3>
                                  {{-- <h4 class="modal-title"id="myModalLabel">substr($event->short_description,0,103) }}</h4>--}}
                              </div>
                              <div class="col-lg-1 col-md-1 eventspop-col-dates eborder">
                                <p class="dates">{{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D') }}</p>
                            <p class="months">{{\Carbon\Carbon::parse($event->eventdate)->isoFormat('MMM') }}</p>
                              </div>
                            </div>
                        </div>
                        <!--modal-header-->
                        <div class="modal-body conts">
                          <p style="height: 74%">{{$event->description}}</p>
                          <div class="row">
                            <div class="col-md-12 text-center" style="text-transform: uppercase;">
                              @if (!empty($event->enddate))
                                 {{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D | MMMM | Y') }}
                              @else
                              {{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D | MMMM | Y') }} to {{\Carbon\Carbon::parse($event->enddate)->isoFormat('D | MMMM | Y') }}
                              @endif
                              </div>
                            <div class="col-md-12 text-center" style="text-transform: uppercase;">VANUE | {{$event->exhibition}}</div>
                            <div class="col-md-12 text-center" style="text-transform: uppercase;">GALLERY {{$event->ticket}}</div>
                            <div class="col-md-6 text-center" style="text-transform: uppercase;">TICKETS: {{$event->website}}</div>
                            <div class="col-md-6 text-center" style="text-transform: uppercase;">INQUIRIES: {{$event->ephone}}</div>
                          </div>
                        </div>
                        <!--modal-body-->
                        <div class="modal-footer modal-esocial">
                          <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>
                          </a>
                          <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </div>
                        <!--modal-footer-->
                      </div>
                      <!--modal-header-->
                    </div>
                  </div>
                <!--right col-lg-6 col-md-6-->
                </div>
                <!--row-->
              </div>
        <!-- View Model end -->
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
