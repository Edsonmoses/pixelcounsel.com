<div>
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
    <div class="container" style="margin-top: 50px">
        <div class="row align-items-center job-box">
            <div class="col-lg-5 col-md-4">
                <img src="{{ asset('assets/images/events') }}/{{ $event->images }}" class="img-fluid rounded shadow event-img-top" alt="" width="100%" height="400">
            </div>

            <div class="col-lg-7 col-md-8">
                <div class="about-desc ml-lg-4">
                    <h3 class="text-dark" style="text-transform:uppercase">{{$event->name}}</h3>

                    <p class="text-muted">
                        {!! html_entity_decode($event->description)!!}<br/><br/>
                        Date: @if (!empty($event->enddate))
                            {{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D MMMM Y') }}
                        @else
                        {{\Carbon\Carbon::parse($event->eventdate)->isoFormat('D MMMM Y') }} to {{\Carbon\Carbon::parse($event->enddate)->isoFormat('D MMMM Y') }}
                        @endif<br/>
                         VANUE : {{$event->exhibition}}<br/>
                        GALLERY: {{$event->ticket}}<br/>
                        TICKETS:  <a href="https://{{$event->website}}" class="text-muted" style="text-decoration: none" target="_blank">Click here</a><br/>
                        INQUIRIES: {{$event->ephone}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
