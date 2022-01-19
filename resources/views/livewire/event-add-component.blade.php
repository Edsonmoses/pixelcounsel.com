<div>
    <header class="intro-header intro-events">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="heading-style">
                        <h1>Post a New Event</h1>
                        <span class="sub-heading">What’s happening where and when (and if the drinks are on the house)</span>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 vector-s-btn">
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
                        <form id="contact-form3" class="form-horizontal" wire:submit.prevent="addEvent">
                            
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
                                    <div class="form-group app-label mt-2">
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
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Event End Date & Time</label>
                                        <input wire:model="enddate"
                                        type="text" class="form-control input-md datepicker" placeholder="Event End Date & Time" autocomplete="off"
                                        data-provide="datepicker" data-date-autoclose="true" data-date-format="dd-mm-yyyy" data-date-today-highlight="true"                        
                                        onchange="this.dispatchEvent(new InputEvent('input'))">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Event Start Date & Time</label>
                                        <input wire:model="eventdate"
                                        type="text" class="form-control input-md datepicker" placeholder="Event Start Date & Time" autocomplete="off"
                                        data-provide="datepicker" data-datetime-autoclose="true" data-datetime-format="dd-mm-yyyy" data-date-today-highlight="true"                        
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
                                    <a href="#" class="btn btn-primary">Post a event</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>