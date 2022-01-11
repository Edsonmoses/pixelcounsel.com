<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-dark mb-3">{{$hookup->jobtitle }}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="job-detail border rounded p-4">
                    <div class="job-detail-content">
                        <img src="{{ asset('assets/images/featured-job/img-4.png') }}" alt="" class="img-fluid float-left mr-md-3 mr-2 mx-auto d-block">
                        <div class="job-detail-com-desc overflow-hidden d-block">
                            <h4 class="mb-2"><a href="#" class="text-dark">{{$hookup->jobtitle}}</a></h4>
                            <p class="text-muted mb-0"><i class="fa fa-link mr-2"></i>{{$hookup->company}}</p>
                            <p class="text-muted mb-0"><i class="fa fa-map-marker mr-2"></i>{{$hookup->location}}</p>
                        </div>
                    </div>

                    <div class="job-detail-desc mt-4">
                        <p class="text-muted mb-3">{!! html_entity_decode($hookup->short_description)!!}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-dark mt-4 h5">Job Description :</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <p class="text-muted mb-3">{!! html_entity_decode($hookup->description)!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{--@if ($Qualification)
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-dark mt-4 h5">Qualification :</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Morbi mattis ullamcorper velit. Phasellus gravida semper nisi nullam vel sem.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Pellentesque auctor neque nec urna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi.</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-0">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif  --}}
                {{-- @if ($responsibilities)
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-dark mt-4 h5">Primary Responsibilities :</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-detail border rounded mt-2 p-4">
                            <div class="job-detail-desc">
                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">HTML, CSS &amp; Scss</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Javascript</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">PHP</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-2">Photoshop</p>
                                </div>

                                <div class="job-details-desc-item">
                                    <div class="float-left mr-3">
                                        <i class="fa fa-send text-primary"></i>
                                    </div>
                                    <p class="text-muted mb-0">Illustrator</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif  --}}
            </div>

            <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 job-detailed">
                <div class="job-detail border rounded p-4">
                    <h5 class="text-muted text-center pb-2 h5"><i class="fa fa-map-marker mr-2"></i>Location</h5>

                    <div class="job-detail-location pt-4 border-top">
                        <div class="job-details-desc-item mt-4">
                            <div class="float-left mr-2">
                                <i class="fa fa-bank text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->company}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-envelope text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->email}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-globe text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->web}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-mobile text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->phone}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-usd text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->price}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-shield text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: {{$hookup->experience}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-clock-o text-muted"></i>
                            </div>
                            <p class="text-muted mb-2">: 4 minutes ago</p>
                        </div>

                        <h6 class="text-dark f-17 mt-3 mb-0">Share Job :</h6>
                        <ul class="social-icon list-inline mt-3 mb-0">
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="job-detail border rounded mt-4 p-4">
                    <h5 class="text-muted text-center pb-2 h5"><i class="fa fa-clock-o mr-2"></i>Opening Hours</h5>

                    <div class="job-detail-time border-top pt-4">
                        <ul class="list-inline mb-0">
                            <li class="clearfix text-muted border-bottom pb-3">
                                <div class="float-left">Monday</div>
                                <div class="float-right">
                                    <h5 class="f-13 mb-0">9AM - 7PM</h5>
                                </div>
                            </li>

                            <li class="clearfix text-muted border-bottom pb-3">
                                <div class="float-left">Tuesday</div>
                                <div class="float-right">
                                    <h5 class="f-13 mb-0">9AM - 7PM</h5>
                                </div>
                            </li>

                            <li class="clearfix text-muted border-bottom pb-3">
                                <div class="float-left">Wednesday</div>
                                <div class="float-right">
                                    <h5 class="f-13 mb-0">9AM - 7PM</h5>
                                </div>
                            </li>

                            <li class="clearfix text-muted border-bottom pb-3">
                                <div class="float-left">Thursday</div>
                                <div class="float-right">
                                    <h5 class="f-13 mb-0">9AM - 7PM</h5>
                                </div>
                            </li>

                            <li class="clearfix text-muted border-bottom pb-3">
                                <div class="float-left">Friday</div>
                                <div class="float-right">
                                    <h5 class="f-13 mb-0">9AM - 7PM</h5>
                                </div>
                            </li>

                            <li class="clearfix text-muted border-bottom pb-3">
                                <div class="float-left">Saturday</div>
                                <div class="float-right">
                                    <h5 class="f-13 mb-0">6:30AM - 1PM</h5>
                                </div>
                            </li>

                            <li class="clearfix text-muted pb-0">
                                <div class="float-left">Sunday</div>
                                <div class="float-right">
                                    <h5 class="f-13 mb-0">Closed</h5>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="job-detail border rounded mt-4">
                    <a href="#" class="btn btn-primary btn-block rounded">Apply For Job</a>
                </div>
            </div>
        </div>
    </div>
</div>
