<a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-bell noti-icon"></i>
                               
                                <span class="badge bg-danger rounded-circle noti-icon-badge"> 
                                     @if ($approve >= 1)
                                        {{ $approve  }}
                                     @else
                                        0
                                    @endif
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-lg">
    
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification {{ $approved }}
                                    </h5>
                                </div>
    
                                <div class="noti-scroll" data-simplebar>
                                    <!-- item-->
                                     @foreach ($vectors as $vector )
                                      @if ($approved = 1)
                                        <a href="{{ route('user.vecedit',['vector_slug'=>$vector->slug]) }}" wire:click.prevent="updateVector({{ $vector->id }})" class="dropdown-item notify-item active">
                                            <div class="notify-icon">
                                                <img src="{{ asset('assets/images/vectors') }}/{{ $vector->image }}" class="img-fluid rounded-circle" alt="{{ $vector->image }}" /> </div>
                                            <p class="notify-details">{{ $vector->name }}</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>{{substr($vector->description,0,24)}} </small>
                                            </p>
                                        </a>
                                         @endif
                                     @endforeach
                                     <!-- item-->
                                     @foreach ($hookup as $hookup)
                                      @if ($approved = 1)
                                        <a href="{{ route('user.hookedit',['hookup_slug'=>$hookup->slug]) }}" wire:click.prevent="updateHookup({{ $hookup->id }})" class="dropdown-item notify-item active">
                                            <div class="notify-icon">
                                                <img src="{{ asset('assets/images/hookups') }}/{{ $hookup->images }}" class="img-fluid rounded-circle" alt="{{ $hookup->name }}" /> 1</div>
                                            <p class="notify-details">{{ $hookup->name }}</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>{{$hookup->company}}</small>
                                            </p>
                                        </a>
                                        @endif
                                     @endforeach

                                      <!-- item-->
                                     @foreach ($events as $event )

                                      @if ($approved = 1)
                                        <a href="{{ route('user.evedit',['event_slug'=>$event->slug]) }}" wire:click.prevent="updateEvent({{ $event->id }})" class="dropdown-item notify-item active">
                                            <div class="notify-icon">
                                                <img src="{{ asset('assets/images/events') }}/{{ $event->images }}" class="img-fluid rounded-circle" alt="{{ $event->name }}" /> </div>
                                            <p class="notify-details">{{ $event->name }}</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>{{$event->exhibition }}</small>
                                            </p>
                                        </a>
                                        @endif
                                     @endforeach
                                </div>
    
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fe-arrow-right"></i>
                                </a>
    
                            </div>