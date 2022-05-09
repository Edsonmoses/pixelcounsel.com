<div>
    <div class="vector-active"><div class="arrows"></div></div>
<header class="intro-header intro-header-vector">
    <div class="container">
        <div class="row  header-0">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <div class="heading-style">
                    <h1>VECTOR LOGOS</h1>
                    <span class="sub-heading">Online vector logo collection of brands in Africa</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 vector-s-btn">
              @if (Auth::check())
                  <a class="btn btn-vector v-single" href="{{route('vector.addvectors')}}" role="button">SUBMIT A LOGO</a>
                  @else
                  <a class="btn btn-vector v-single" href="{{route('login')}}" title="Login" role="button">SUBMIT A LOGO</a>
                  @endif
            </div>
        </div>
    </div>
</header>
<header class="intro-header intro-header-vector-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
              <div id="custom-search-input" style="margin-top: 83px">
                {{--<div class="input-group col-md-12">
                    <input type="text" class="search-query form-control" placeholder="Find a logo"  wire:model="searchTerm"/>
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button">
                            <span class=" glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>--}}
                @livewire('home-search-component')
                @if ($searchTerm)
                <ul class="hmsearch">
                    @foreach($vector as $vector)
                        <li><a href="{{ route('vector.vectors',['slug'=>$vector->slug]) }}">{{ $vector->name }}</a></li>
                    @endforeach
                </ul>
                @endif
            </div>
            </div>
            <div class="col-lg-6 col-md-6 vector-s-btn text-right">
            
            </div>
            
        </div>
    </div>
</header>
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 download-image">

				<img src= "{{ asset('assets/images/vectors') }}/{{ $vector->image }}" alt="{{$vector->name}}">
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="vector-detail">
                    <small>{{ $vector->name }}</small><br/>
                    <p class="p-border"></p>
                    {{-- <small><spanstyle="padding-right:40px;">Designer:</span><spanclass="pulls">$vector->designer }}</span></small><br/>
                    <p class="p-border"></p>--}}
                    <small><span style="padding-right: 50px;">Format:</span><span class="pulls">{{ $vector->format}}</span></small><br/>
                    <p class="p-border"></p>
                    <small><span style="padding-right: 22px;">Contributor:</span><span class="pulls">{{ $vector->contributor }}</span></small><br/>
                    <p class="p-border"></p>
                    <small>Date uploaded: <span class="pulls">{{\Carbon\Carbon::parse($vector->created_at)->isoFormat('MMM Do YYYY') }}<span></small><br/>
                      <p class="p-border"></p>
                      <small><span style="padding-right: 22px;">Downloads:</span> <span class="pulls">{{ $vector->downloads }}<span></small><br/>
                    @foreach (explode(",",$vector->vtag) as $tags)
                        @if (!empty($tags))
                            <a href="{{ route('vector.vtag',['vtag'=>$tags]) }} " class="mb-3"><small class="pull-left" style="margin-top: 10px; margin-right: 5px;border-radius: 5px;border: 1px solid gray;padding: 5px;"> 
                                {{ $tags }}     
                            </small></a>
                        @endif
                    @endforeach
                        @livewire('right-ads-component')
                </div>
            </div>
            <!--left col-->
        </div>
    </div>
    <hr/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 vector-download">
              <p>The above logo design and the artwork you are about to download is the intellectual property of the copyright and/or trademark holder and is offered to you as a convenience for lawful use with proper permission from the copyright and/or trademark holder only. You hereby agree that you agree to the Terms of Use and that the artwork you download will be used for non-commercial use without infringing on the rights of the copyright and/or trademark holder and in compliance with the DMCA act of 1998. Before you use or reproduce this artwork in any manner, you agree to obtain the express permission of the copyright and/or trademark holder. Failure to obtain such permission is a violation of international copyright and trademark laws subject to specific financial and criminal penalties.</p>
                <div class="row">
                    <div class="col-md-3">
                        <input type="checkbox" id="toggle" value="downloaded" wire:model="downloadmodes"/>
                        <span>I agree</span>
                        @if($downloadmodes == 'downloaded')
                            <a  style="margin-bottom:10px; margin-left:20px;" href="#" wire:click="export({{$vector->id}})"><small class="v-download btns"> Download | <i class="fa fa-arrow-down" aria-hidden="true"></i></small></a>
                        @else
                        <a  style="margin-bottom:10px; margin-left:20px;" class="disabled" id="to-toggle"><small class="v-download disable"> Download | <i class="fa fa-arrow-down" aria-hidden="true"></i></small></a>
                        @endif
                  </div>
            </div>
        </div>
        <div class="space-footer mt-3"></div>
        <!--bottom ad col-->
        @livewire('bottom-ads-component')
        <!--bottom ad col end-->
    </div>

  </div>
    <hr/>
    <div class="container">
      <h4 class="related-title">Related</h4>
        <div class="row">
          @foreach ($related_vectors as $r_vectors)
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 related-image">
              <a href="{{ route('vector.vectors',['slug'=>$r_vectors->slug]) }}" title="{{ $r_vectors->name }}">
                <img src= "{{ asset('assets/images/vectors') }}/{{ $r_vectors->image }}" alt="{{ $r_vectors->name }}">
              </a>
            </div>
            @endforeach
        </div>
  <div style="height: 50px"></div>
</article>
</div>
<script>
    $(document).ready(function() {
      $(".select2").select2();
    });
  
  /*var link = $("#to-toggle");
  $("#toggle").on("change", function() {
      if(this.checked) {
          link.attr("href", link.data("href"));
          $('.v-download').addClass('btns');
          $('.v-download').removeClass('disable');
      } else {
          link.removeAttr("href");
          $('.v-download').addClass('disable');
          $('.v-download').removeClass('btns');
      }
  });
  var elements = document.getElementsByTagName("INPUT");
  for (var inp of elements) {
      if (inp.type === "checkbox")
          inp.checked = false;
  }*/
  </script>
  <script> 
    window.livewire.on('startDownload', path => {
        // open the download in a new tab/window to 
        // prevent livewire component from freezing
        window.open('download/' + path, '_blank');
    });
</script>
