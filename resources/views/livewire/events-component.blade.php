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
                    <img class="bd-placeholder-img card-img-top mb-img" src="{{ asset('assets/images/events') }}/{{ $event->images }}" alt="{{$event->name}}"  width="100%" height="262">
                  <div class="card-body">
                    <div class="row  col-bb">
                        <div class="col-sm-8 col-infos">
                          <a href="#" role="button" data-toggle="modal" data-target="#eventModal_{{$event->id}}"><h2 class="card-title" >{{$event->name}}</h2></a>
                            <p class="card-text">{{substr($event->short_description,0,51)}}</p>
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
        </a>
        @endif
        @endforeach
        
        </div>
</div>
</div>
