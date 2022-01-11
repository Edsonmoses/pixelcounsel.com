<div>
    <div class="container" style="margin-top: 50px">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-4">
                <img src="{{ asset('assets/images/events') }}/{{ $event->images }}" class="img-fluid rounded shadow event-img-top" alt="" width="100%" height="400">
            </div>

            <div class="col-lg-7 col-md-8">
                <div class="about-desc ml-lg-4">
                    <h3 class="text-dark" style="text-transform:uppercase">{{$event->name}}</h3>

                    <p class="text-muted">
                        {{$event->description}}<br/>
                        Date: @if (!empty($event->enddate))
                            {{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D | MMMM | Y') }}
                        @else
                        {{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D | MMMM | Y') }} to {{\Carbon\Carbon::parse($event->enddate)->isoFormat('D | MMMM | Y') }}
                        @endif<br/>
                         VANUE : {{$event->exhibition}}<br/>
                        GALLERY: {{$event->ticket}}<br/>
                        TICKETS:  <a href="https://{{$event->website}}" class="text-muted" style="text-decoration: none" target="_blank">{{$event->website}}</a><br/>
                        INQUIRIES: {{$event->ephone}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
