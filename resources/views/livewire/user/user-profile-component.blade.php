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
                          @if ($user->profile->image) 
                                <img src="{{ asset('assets/images/profiles')}}/{{ $user->profile->image }}"  class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3" alt="{{ $user->name}}"/>
                          @else
                              <img src="{{ asset('assets/images/profiles/default.jpg')}}"  class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3" alt="{{$user->name}}"/>
                          @endif

                            <div class="flex-grow-1 overflow-hidden">
                                <h4 class="m-0">{{ $user->name }}</h4>
                                <p class="text-muted"><i>Web Designer</i></p>
                                <p class="font-13 col-sm-8">{{ $user->profile->about }}</p>
                                <p class="font-13"><b>Email: </b>{{ $user->email }}</p>
                                <hr/>
                                <p class="font-13"><b>Phone: </b>{{ $user->profile->phone }}</p>
                                <hr/>
                                <p class="font-13"><b>City: </b>{{ $profile->city }}</p>
                                <hr/>
                                <p class="font-13"><b>Locations: </b>{{ $profile->locations }}</p>
                                <hr/>

                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i
                                                class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                                class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                                class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                                class="mdi mdi-github"></i></a>
                                    </li>
                                </ul>

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
   