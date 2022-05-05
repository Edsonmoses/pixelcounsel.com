<div>
    <header class="intro-header intro-events">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <div class="heading-style">
                        <h1>EVENTS</h1>
                        <span class="sub-heading">What’s happening where and when (and if the drinks are on the house)</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 vector-s-btn">
                    @if (Auth::check())
                        <a class="btn btn-events" href="{{ route('events.addevent') }}" role="button">SUBMIT AN EVENT</a>
                    @else
                         <a class="btn btn-events" href="{{route('login')}}" title="Login" role="button">SUBMIT AN EVENT</a>
                    @endif
                </div>
            </div>
        </div>
      </header>
    <div class="container" style="margin-top: 50px">
        <div class="row align-items-center rounded job-box">
            <div class="col-lg-5 col-md-4 event-ml">
                <img src="{{ asset('assets/images/events') }}/{{ $event->images }}" class="img-fluid rounded event-img-top" alt="" width="100%" height="400"  data-toggle="modal" data-target="#eventModal">
            </div>

            <div class="col-lg-5 col-md-6">
                <div class="about-desc ml-lg-4">
                    <h3 class="text-dark" style="text-transform:uppercase">{{$event->name}}</h3>

                    <p class="text-muted">
                        {!! html_entity_decode($event->description)!!}<br/><br/>
                        Date: @if (!empty($event->enddate))
                        {{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D MMMM Y') }} to {{\Carbon\Carbon::parse($event->enddate)->isoFormat('D MMMM Y') }}
                        <br/>
                        @else
                        {{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D MMMM Y') }}
                        <br/>
                        @endif
                         VANUE : {{$event->exhibition}}<br/>
                        @if (!empty($event->ticket))
                        @else
                        GALLERY: {{$event->ticket}}
                        <br/>
                        @endif
                        @if (!empty($event->website))
                        @else
                        TICKETS:  <a href="https://{{$event->website}}" target="_blank" class="text-muted" style="text-decoration: none" target="_blank">Click here</a>
                        <br/>
                        @endif
                        @if (!empty($event->ephone))
                        @else
                        INQUIRIES: {{$event->ephone}}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-2">
                <time datetime="2014-09-24" class="date-as-calendar inline-flex size1_75x">
                    <span class="weekday"></span>
                    <span class="day">{{\Carbon\Carbon::parse($event->enddate)->isoFormat('D') }}</span>
                    <span class="month"></span>
                    <span class="year">{{\Carbon\Carbon::parse($event->enddate)->isoFormat('MMM') }}</span>
                </time>
            </div>
        </div>
    </div>
</div>
  <!-- Modal event created successfully!-->
  <div class="modal fade  events" id="eventModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="eventModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <a href="/events" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body text-center">
           <img src="{{ asset('assets/images/events') }}/{{ $event->images }}" class="img-fluid rounded " alt="" width="100%" height="100%">
        </div>
      </div>
    </div>
  </div>