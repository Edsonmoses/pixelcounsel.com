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
                  <div id="custom-search-input" style="margin-top: 33px">
                    <div class="input-group col-md-12">
                        <input type="text" class="  search-query form-control" placeholder="Find a logo"  wire:model="searchTerm" wire:keydown.enter="searchTerm"/>
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    
                </div>
                
            </div>
        </div>
    </header>
        <!-- Main Content -->
        <div class="container">
            <div class="row" id="vector" wire:loading.delay.class="opacity-50">
              @if ($searchTerm =="")
                <h4 class="text-gray-800">Recently uploaded</h4>
              @else
                  <h4 class="text-gray-800">Your search results</h4>
              @endif
              
              @foreach ($vectorlogos as $vector)
                    @if ($vector->vector_status == 'published')
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 vector-img" @if ($loop->last) id="last_record" @endif>
                            <a href="{{ route('vector.vectors',['slug'=>$vector->slug]) }}"><img class="bd-placeholder-img" src="{{ asset('assets/images/vectors') }}/{{ $vector->image }}" alt="{{ $vector->name }}"  width="100%" height="144"></a>
                        </div> 
                    @endif
                @endforeach
            </div>
            @if ($loadAmount >= $totalRecords)
                  <p class="text-gray-800 font-bold text-2xl text-center my-10">No Remaining Records!</p>
              @endif
          </div> 
           <div style="height: 50px"></div>
        </div>
        <script>
          //Infinite Scroll Loading 
          const lastRecord = document.getElementById('last_record');
          const options = {
              root: null,
              threshold: 1,
              rootMargin: '0px'
          }
          const observer = new IntersectionObserver((entries, observer) => {
              entries.forEach(entry => {
                  if (entry.isIntersecting) {
                      @this.loadMore()
                  }
              });
          });
          
          observer.observe(lastRecord);
          </script>