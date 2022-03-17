<div>
    <header class="intro-header intro-events">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <div class="heading-style">
                        <h1>Post a New Event</h1>
                        <span class="sub-heading">What’s happening where and when (and if the drinks are on the house)</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 vector-s-btn">
                </div>
            </div>
        </div>
      </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="rounded shadow bg-white p-4">
                    <div class="custom-form" style="margin: 0 35px 0 15px !important">
                        @if (Session::has('message'))
                                <div class="alert alert-success" id="message3" role="alert">{{ Session::get('message') }}</div>
                             @endif
                        <form id="updated-form" class="form-horizontal" wire:submit.prevent="storeEvent">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Event Venue</label>
                                        <input type="text" placeholder="Event Venue" class="form-control input-md" wire:model="exhibition">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Event Name</label>
                                        <input type="text" placeholder="Event Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 {{ $errors->get('slug') ? 'has-error' : '' }}">
                                        <label class="text-muted">Event Slug</label>
                                        <input type="text" placeholder="Event Slug" class="form-control input-md" wire:model="slug"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Event Description</label>
                                        <textarea id="description" rows="6" class="form-control resume" placeholder="Event Description" wire:model="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Event Category</label>
                                        <select class="form-control" wire:model="events_categories_id">
                                            <option value="">Select Event Category</option>
                                            @foreach ( $eventcategories as $category )
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Event Type</label>
                                        <select class="form-control" wire:model="etype_id">
                                            <option value="">Select Event Type</option>
                                            @foreach ( $eventtypes as $etype )
                                                <option value="{{ $etype->id }}">{{ $etype->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Event Contact Person's Name</label>
                                        <input type="text" placeholder="Event Contact Person's Name" class="form-control input-md" wire:model="econtact">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Event Contact Email</label>
                                        <input type="text" placeholder="Event Contact Email" class="form-control input-md" wire:model="eventemail">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Phone Number</label>
                                        <input type="text" placeholder="Phone Number" class="form-control input-md" wire:model="ephone">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Website</label>
                                        <input type="url" placeholder="Website" class="form-control input-md" wire:model="website">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2  mr-2">
                                        <label class="text-muted">Ticket Price</label>
                                        <input type="text" placeholder="Ticket Price" class="form-control input-md" wire:model="ticket">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Event Poster or Image</label>
                                        <input type="file" class="form-control input-file" wire:model="images">
                                        @if($images)
                                            <img src="{{ $images->temporaryUrl() }}" width="120"/>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Event Start Date & Time</label>
                                        <input wire:model="eventdate"
                                        type="text" class="form-control input-md datepicker" placeholder="Event Start Date & Time" autocomplete="off"
                                        data-provide="datepicker" data-datetime-autoclose="true" data-date-format="yyyy-mm-dd" data-date-today-highlight="true"                        
                                        onchange="this.dispatchEvent(new InputEvent('input'))">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Event End Date & Time</label>
                                        <input wire:model="enddate"
                                        type="text" class="form-control input-md datepicker" placeholder="Event End Date & Time" autocomplete="off"
                                        data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" data-date-today-highlight="true"                        
                                        onchange="this.dispatchEvent(new InputEvent('input'))">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Event Ticketing Details</label>
                                        <textarea id="short_description" rows="6" class="form-control resume" placeholder="Ticket Details:for each ticket type include name, start & end date for sale max ticket if inclusive and cost" wire:model="short_description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mt-2">
                                    <button type="submit" class="btn btn-primary">Post a event</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- Modal event created successfully!-->
  <div class="modal fade  popups" id="exampleModalLong" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <a href="/events" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body text-center">
            @if (Session::has('message'))
            <h1>AWESOME!</h1>
            <p >Your event has been<br/>
             successfully submitted.</p>
            <a href="{{route('events.addevent')}}" class="btn btn-successfully">
                <i class="fa fa-plus" aria-hidden="true"></i><br/>
                Add another</a><br/>
            <a href="/"><img class="popup_logo" src="{{ asset('assets/uploads/img/PC footer.svg')}}" width="120"/></a>
            @else
            <h1 style="color:firebrick !important;">oooh!</h1>
                <p style="color:firebrick !important;">Something went wrong.</p>
                <a href="{{route('hookup.addhookup')}}" class="btn btn-successfully">
                    <i class="fa fa-plus" aria-hidden="true"></i><br/>
                    Add<br/> another</a><br/>
                <a href="/"><img class="popup_logo" src="{{ asset('assets/uploads/img/PC footer.svg')}}" width="120"/></a>
            @endif
        </div>
      </div>
    </div>
  </div>
<!-- Modal event created successfully! end here-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type='text/javascript'>
    $('#updated-form').submit(function (e) {
          $('#exampleModalLong').modal('show');
          return false;
      });
    </script>
    <style>
   .popups .modal-content {
  position: relative;
  display: flex;
  flex-direction: column;
  width: 100%;
  pointer-events: auto;
  background-color: #333 !important;
  background-clip: padding-box;
  border: 1px solid transparent;
  border-radius: 1.2rem !important;
  outline: 0;
  }
  .popups .modal-content h1{
      font-size: 5.25rem !important;
      color: #fff;
  }
  .popups .modal-content p{
      margin-bottom: 3rem !important;
      font-size: 2.75rem !important;
      color: #fff;
  }
  .popups .modal-header .close {
      margin: 0;
      position: absolute;
      top: -7px;
      right: -26px;
      width: 23px;
      height: 23px;
      border-radius: 23px;
      background-color: transparent !important;
      background: transparent !important;
      color: #fff;
      font-size: 35px;
      opacity: 1;
      z-index: 10;
      text-align: center;
  } 
  .popups .modal-header{
      border-bottom: 1px solid #333 !important;
  }
  .popups .btn-successfully{
     width: 150px;
     height: 150px;
     background: #fff100;
     border-radius: 75px;
     color: #222 !important;
      font-size: 17px;
      text-transform: uppercase;
      line-height: 1.2em;
 }
 .popups .btn-successfully i{
     font-size: 58px;
     -webkit-text-stroke: 7px #fff100 !important;
 }
 .popups .popup_logo{
     width: 80px !important;
     margin-top: 3em;
     margin-bottom: 2em;
 }
    </style>