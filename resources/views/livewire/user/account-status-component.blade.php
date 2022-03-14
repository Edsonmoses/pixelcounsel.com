<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 80%">
          <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <form wire:submit.prevent="updateStatus" onsubmit="window.location.reload();">
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <h1>Hi {{ Auth::user()->name }}</h1>
                            <p>Thanks for contributing to Pixel counsel! You’re awesome. To save you time and increase your chance of being featured, please ensure that your logo meet our submission guidelines.</p>
                            <p>Note: Every logo on Pixel counsel is published under the Pixel counsel License – which allows people to use logos from Pixel counsel for free, including for commercial purposes, without attributing the designer on Pixel counsel. Learn more.</p>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 text-right">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="confirm_status_at" id="last_login_ate"  value="1"  wire:model="confirm_status_at">
                                <label class="custom-control-label" for="last_login_at">I understand and agree</label>
                               
                                 <!-- <button type="button" class="btn btn-light" style="margin-left: 10px; display:none" disabled id="btnCheck">Start uploading</button>-->
                                  <button type="submit" class="btn btn-success" style="margin-left: 10px;" id="btnChecked">Start uploading</button>
                               
                              </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    <div class="vector-active"><div class="arrows"></div></div>
    <header class="intro-header intro-header-vector">
        <div class="container">
            <div class="row  header-0">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="heading-style">
                        <h1>VECTOR LOGOS</h1>
                        <span class="sub-heading">Online vector logo collection of brands in Africa</span>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 vector-s-btn">
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

            $(document).ready(function(){
                $("#exampleModal").modal({
                    show: false,
                    backdrop: 'static'
                });
                $("#exampleModal").modal('show');;
            });
            $(document).ready(function() {    
            $(':checkbox').each(function() {
                $(this).attr('checked', false);
            });
            });
                        $(function () {
        $("#last_login_at").click(function () {
            if ($(this).is(":checked")) {
                $("#btnChecked").show();
                $("#btnCheck").hide();
            } else {
                $("#btnChecked").hide();
                $("#btnCheck").show();
            }
        });
    });
          </script>
