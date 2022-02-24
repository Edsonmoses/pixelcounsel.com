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
        <h4 class="mb-3 mb-md-0">Edit Event</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
          <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
          <input type="text" class="form-control">
        </div>
        <a href="{{route('admin.event')}}" class="btn btn-success pull-right">All Event</a>
      </div>
    </div>
    
    <div class="row">
      <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
          <div class="card-body">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
            @endif
            <form class="form-horizontal" wire:submit.prevent="updateEvent">
                <div class="form-group">
                    <label class="col-md-6 control-label">Event Venue</label>
                    <div class="col-md-6">
                        <input type="text" placeholder="Event Venue" class="form-control input-md" wire:model="exhibition">
                    </div>
                </div>
                <div class="form-group">
                <label class="col-md-6 control-label">Event Name</label>
                <div class="col-md-6">
                    <input type="text" placeholder="Event Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Event Slug</label>
                <div class="col-md-6">
                    <input type="text" placeholder="Event Slug" class="form-control input-md" wire:model="slug"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Event Description</label>
                <div class="col-md-6" wire:ignore>
                    <textarea placeholder="Description" id="description" class="form-control" wire:model="description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Event Category</label>
                <div class="col-md-6">
                    <select class="form-control" wire:model="events_categories_id">
                        <option value="">Select Event Category</option>
                        @foreach ( $eventcategories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Event Type</label>
                <div class="col-md-6">
                    <select class="form-control" wire:model="etype_id">
                        <option value="">Select Event Type</option>
                        @foreach ( $eventtypes as $etype )
                            <option value="{{ $etype->id }}">{{ $etype->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Event Status</label>
                <div class="col-md-6">
                    <select class="form-control" wire:model="events_status">
                        <option value="">Select Event Status</option>
                        <option value="published">Published</option>
                        <option value="unpublished">Unpublished</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Event Contact Person's Name</label>
                <div class="col-md-6">
                    <input type="text" placeholder="Event Contact Person's Name" class="form-control input-md" wire:model="econtact">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Event Contact Email</label>
                <div class="col-md-6">
                    <input type="text" placeholder="Event Contact Email" class="form-control input-md" wire:model="eventemail">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Phone Numbe</label>
                <div class="col-md-6">
                    <input type="text" placeholder="Phone Number" class="form-control input-md" wire:model="ephone">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Website</label>
                <div class="col-md-6">
                    <input type="text" placeholder="Website" class="form-control input-md" wire:model="website">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Ticket Price/Entrance Fee</label>
                <div class="col-md-6">
                    <input type="text" placeholder="Ticket Price" class="form-control input-md" wire:model="ticket">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Event Poster</label>
                <div class="col-md-6">
                    <input type="file" class="form-control input-file" wire:model="newimage">
                    @if($newimage)
                        <img src="{{ $newimage->temporaryUrl() }}" width="120"/>
                    @else
                        <img src="{{ asset('assets/images/events')}}/{{ $images }}" width="120"/>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Event Start Date & Time</label>
                <div class="col-md-6">
                    <input wire:model="eventdate"
                    type="text" class="form-control input-md datepicker" placeholder="Event Start Date & Time" autocomplete="off"
                    data-provide="datepicker" data-datetime-autoclose="true" data-date-format="yyyy-mm-dd" data-date-today-highlight="true"                        
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Event End Date & Time</label>
                <div class="col-md-6">
                    <input wire:model="enddate"
                    type="text" class="form-control input-md datepicker" placeholder="Event End Date & Time" autocomplete="off"
                    data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" data-date-today-highlight="true"                        
                    onchange="this.dispatchEvent(new InputEvent('input'))">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label">Event Ticketing Details</label>
                <div class="col-md-6" wire:ignore>
                    <textarea placeholder="Ticket Details:for each ticket type include name, start & end date for sale max ticket if inclusive and cost" id="short_description" class="form-control" wire:model="short_description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6 control-label"></label>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div> <!-- row -->