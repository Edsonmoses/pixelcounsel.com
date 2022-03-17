<div>
    <div class="content-page">
      <div class="content">
  
          <!-- Start Content-->
          <div class="container-fluid">
  
              <div class="row">
                  <div class="col-sm-12">
                      <div class="card">
                      <div class="bg-picture card-body">
                          <div class="d-flex align-items-top">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                              <div class="flex-grow-1 overflow-hidden">
                                <form class="form-horizontal" id="updated-form" wire:submit.prevent="storeEvent">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="exhibition" class="form-label">Event Venue</label>
                                                <input type="text" placeholder="Event Venue" id="exhibition" class="form-control" wire:model="exhibition">
                                                @error('exhibition')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Event Name</label>
                                                <input type="text" placeholder="Event Name" id="name" class="form-control" wire:model="name" wire:keyup="generateSlug">
                                                @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="slug" class="form-label  {{ $errors->get('slug') ? 'has-error' : '' }}">Event Slug</label>
                                                    <input type="text" placeholder="Event Slug" id="slug" class="form-control" wire:model="slug">
                                                    @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="events_categories_id" class="form-label">Event Category</label>
                                                    <select class="form-select" id="events_categories_id" wire:model="events_categories_id">
                                                        <option value="">Select Event Category</option>
                                                        @foreach ( $eventcategories as $category )
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="etype_id" class="form-label"> Event Type</label>
                                                    <select class="form-select" id="etype_id" wire:model="etype_id">
                                                        <option value="">Select Event Type</option>
                                                        @foreach ( $eventtypes as $etype )
                                                            <option value="{{ $etype->id }}">{{ $etype->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="econtact" class="form-label">Event Contact Person's Name</label>
                                                    <input type="text" placeholder="Event Contact Person's Name" id="econtact" class="form-control"  wire:model="econtact">
                                                    @error('econtact')<p class="text-danger">{{ $message }}</p>@enderror 
                                                </div>
                                            </div>
                                          <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="eventemail" class="form-label">Event Contact Email</label>
                                                <input type="text" placeholder="Event Contact Email" id="eventemail" class="form-control" wire:model="eventemail">
                                                @error('eventemail')<p class="text-danger">{{ $message }}</p>@enderror 
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="ephone" class="form-label">Phone Number</label>
                                                <input type="text" placeholder="Phone Number" id="ephone" class="form-control"  wire:model="ephone">
                                                @error('ephone')<p class="text-danger">{{ $message }}</p>@enderror 
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="website" class="form-label">Website</label>
                                                <input type="url" placeholder="Website" id="website" class="form-control" wire:model="website">
                                                @error('website')<p class="text-danger">{{ $message }}</p>@enderror 
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="ticket" class="form-label">Ticket Pric</label>
                                                <input type="text" placeholder="Ticket Pric" id="ticket" class="form-control" wire:model="ticket">
                                                @error('ticket')<p class="text-danger">{{ $message }}</p>@enderror 
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="images" class="form-label">Event Poster or Image</label>
                                                <input type="file" class="form-control input-file" wire:model="images">
                                                @if($images)
                                                    <img src="{{ $images->temporaryUrl() }}" width="120"/>
                                                @endif
                                            </div>
                                        </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="eventdate" class="form-label"> Event Start Date & Time</label>
                                            <input wire:model="eventdate" type="date" placeholder="Event Start Date & Time" autocomplete="on" id="open" class="form-control"data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" data-date-today-highlight="true"                        
                                            onchange="this.dispatchEvent(new InputEvent('input'))">
                                            @error('eventdate')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="enddate" class="form-label"> Event End Date & Time</label>
                                            <input wire:model="enddate" type="date" placeholder="Event End Date & Time" autocomplete="on" id="open" class="form-control"data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" data-date-today-highlight="true"                        
                                            onchange="this.dispatchEvent(new InputEvent('input'))">
                                            @error('enddate')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Event Description</label>
                                            <textarea class="form-control" placeholder="Event Description" id="description" rows="5" wire:model="description"></textarea>
                                            @error('description')<p class="text-danger">{{ $message }}</p>@enderror 
                                        </div>
                                    </div>
                                  <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="short_description" class="form-label">Event Ticketing Details</label>
                                        <textarea class="form-control" id="short_description" placeholder="Ticket Details:for each ticket type include name, start & end date for sale max ticket if inclusive and costs" rows="5" wire:model="short_description"></textarea>
                                        @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror 
                                    </div>
                                </div>
                                    </div><!--row-->
                                    <button type="submit" class="btn btn-success">Update a event</button>
                                </form>
                              </div>
  
                              <div class="clearfix"></div>
                          </div>
                      </div>
                  </div>
                      <!--/ meta -->
                  </div>
              </div>    
          </div> <!-- container -->
  
      </div> <!-- content -->
  </div>
      <!-- Modal event created successfully!-->
    <div class="modal fade  popups" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <a href="{{route('user.events')}}" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            <div class="modal-body text-center">
                <h1>AWESOME!</h1>
                <p >Your event has been<br/>
                 successfully submitted.</p>
                <a href="{{route('user.evadd')}}" class="btn btn-successfully">
                    <i class="fa fa-plus" aria-hidden="true"></i><br/>
                    Add another</a><br/>
                <a href="/"><img class="popup_logo" src="{{ asset('assets/uploads/img/PC footer.svg')}}" width="120"/></a>
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
        .modal-header .close {
                margin: 0;
                position: absolute;
                top: -10px;
                right: -10px;
                width: 23px;
                height: 23px;
                border-radius: 23px;
                background-color: #313844;
                color: #fff;
                font-size: 16px;
                opacity: 1;
                z-index: 10;
                text-align: center;
            } 
        </style>