<div>
    <div class="hookup-actives"><div class="hookup-arrows"></div></div>
<header class="intro-header intro-hookup">
  <div class="container">
      <div class="row">
          <div class="col-lg-7 col-md-7">
              <div class="heading-style">
                  <h1>HOOK UP</h1>
                  <span class="sub-heading">Collection of career changing jobs in Africa for your picking</span>
              </div>
          </div>
          <div class="col-lg-5 col-md-5">
          
          </div>
      </div>
  </div>
</header>
	<!-- Main Content -->
	<div class="container">
		<div class="hookup">
            <div class="container">
                <div class="row">
                <div class="col-lg-5 col-md-5 hook-search">
                    <div class="vector-search heading-mt">  
                        <div class="input-group">
                        <input class="form-control" placeholder="Find a logo here" type="text" wire:model="searchTerm">
                        <div class="input-group-btn">
                        <button type="submit" id="searchbtn">
                            <i class="fa fa-search" aria-hidden="true"></i> </button>
                        </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-12 col-md-12">
                        <form action="#">
                            @foreach ($hookupcategories as $h_catagory)
                            <div class="radio-inline">
                              <a href="{{ route('hookup.category',['category_slug'=>$h_catagory->slug]) }}">
                                <label class="radio-inline" for="executive">
                                <input type="radio" class="form-check-input" id="executive" name="optradio" value="{{ $h_catagory->name}}">{{ $h_catagory->name}}
                              </label></a>
                            </div>
                            @endforeach
                
                          </form>
                          
                    </div>
                </div>
            </div>
		</div>
	</div>
		<div class="container">
	    <div class="row" id="hookup">
        <div class="col-lg-8 col-md-8">
          <table class="table table-striped">
            <tbody>
                @foreach ($hookups as $hookup)
                    <tr>
                        <td class="color-up">{{$hookup->company}}</td>
                        <td>{{$hookup->jobtitle}}<br/>{{$hookup->short_description}}</td>
                        <td>{{$hookup->location}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
	    </div>
  </div>
  <div style="height: 50px"></div>
</div>
