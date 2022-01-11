<div>
    <div class="vector-active"><div class="arrows"></div></div>
<header class="intro-header intro-header-vector">
    <div class="container">
        <div class="row  header-0">
            <div class="col-lg-7 col-md-7">
                <div class="heading-style">
                    <h1>VECTOR LOGOS</h1>
                    <span class="sub-heading">Online vector logo collection of brands in Africa</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
              
            </div>
        </div>
    </div>
</header>
<header class="intro-header intro-header-vector-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="vector-search" style="margin:25px 0 0 0">
					<form action="#" role="search">
						
					<div class="input-group">
					<input class="form-control" placeholder="Online vector logo collection of brands in Africa" name="query" id="ed-srch-term" type="text" wire:model="searchTerm">
					<div class="input-group-btn">
					<button type="submit" id="searchbtn">
						<i class="fa fa-search" aria-hidden="true"></i> </button>
					</div>
					</div>
					</form>
			    </div>
            </div>
            <div class="col-lg-8 col-md-8 vector-s-btn text-right">
              <a class="btn btn-vector v-single" href="#" role="button" data-toggle="modal" data-target="#logoModal">SUBMIT A LOGO</a>
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
                    <small><span style="padding-right: 40px;">Designer:</span><span class="pulls">{{ $vector->designer }}</span></small><br/>
                    <p class="p-border"></p>
                    <small><span style="padding-right: 50px;">Format:</span><span class="pulls">{{ $vector->format}}</span></small><br/>
                    <p class="p-border"></p>
                    <small><span style="padding-right: 22px;">Contributor:</span><span class="pulls">{{ $vector->contributor }}</span></small><br/>
                    <p class="p-border"></p>
                    <small>Date uploaded: <span class="pulls">{{\Carbon\Carbon::parse($vector->created_at)->isoFormat('MMM Do YYYY') }}<span></small><br/>
                    <p>TAGS:</p>
                       <!--<a href="#"><small class="pull-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px;">  
                                    
                        </small></a>-->
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
                        <input type="checkbox" id="toggle"/>
                        <span>I agree</span>
                        <a  style="margin-bottom:10px; margin-left:20px;" class="disabled" id="to-toggle" href="#" wire:click="export({{$vector->id}})"><small class="v-download disable"> Download | <i class="fa fa-arrow-down" aria-hidden="true"></i></small></a>
                  </div>
            </div>
        </div>
        <div class="space-footer"></div>
    </div>

  </div>
    <hr/>
    <div class="container">
      <h4 class="related-title">Related</h4>
        <div class="row">
          @foreach ($related_vectors as $r_vectors)
            <div class="col-lg-2 col-md-2 related-image">
              <a href="{{ route('vector.vectors',['slug'=>$r_vectors->slug]) }}" title="{{ $r_vectors->name }}">
                <img src= "{{ asset('assets/images/vectors') }}/{{ $r_vectors->image }}" alt="{{ $r_vectors->name }}">
              </a>
            </div>
            @endforeach
        </div>
    <!-- The Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="logoModal" wire:ignore.self>
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Submit a logo here</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <!-- Main content -->
          <section class="contener">
            <div class="row">
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Titles</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  @if (Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                              @endif
                  <form class="form-horizontal" wire:submit.prevent="addVector">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-5" style="margin: 0 35px 0 15px !important">
                              <div class="form-group">
                                <label for="name">Vector Name</label>
                                <input type="text" placeholder="Vector Name" class="form-control input-md" wire:model="name"/>
                              </div>
                
                              <div class="form-group">
                                <label for="slug">Vector Slug</label>
                                <input type="text" placeholder="Vector Slug" class="form-control input-md" wire:model="slug"/>
                              </div>
                              
                              <div class="form-group">
                                <label for="designer">Designer</label>
                                <input type="text" placeholder="Designer" class="form-control input-md" wire:model="designer">
                            </div>
                            <div class="form-group">
                              <label for="format">Format</label>
                              <select class="form-control" wire:model="format">
                                <option value="ai">AI</option>
                                <option value="eps">EPS</option>
                                <option value="pdf">PDF</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="vectors_image">Vector File</label>
                                <input type="file" class="form-control input-file" wire:model="images">
                            </div>
                            <div class="form-group">
                              <label for="vectors_image">Vector Preview</label>
                              <input type="file" class="form-control input-file" wire:model="image">
                              @if($image)
                                  <img src="{{ $image->temporaryUrl() }}" width="120"/>
                              @else
                                  <img src="{{ asset('assets/images/placesholder.jpg')}}" width="120"/>
                              @endif
                          </div>
                            <div class="form-group">
                                <label for="vectors_thumbnail">Vector Category</label>
                                <select class="form-control" wire:model="vector_cate_id">
                                  <option value="">Select Vector Category</option>
                                  @foreach ( $vectorcategories as $category )
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                          {{--<div class="form-group">
                              <label for="contributor">Contributor</label>
                              <input type="text" class="form-control" id="contributor" name="contributor" value="" placeholder="contributor">
                          </div>--}}<br/><br/>
                          
                        </div>
                     </div>
                    </div>
                    <!-- /.box-body -->
                    
                    <div class="box">
                     <div class="box-header">
                       <h3 class="box-title">Short Description
                         <small>Simple and fast</small>
                       </h3>
                       <!-- tools box -->
                       <div class="pull-right box-tools">
                         <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                           <i class="fa fa-minus"></i></button>
                         </div>
                         <!-- /. tools -->
                       </div>
                       <!-- /.box-header -->
                       <div class="box-body">
                        <textarea placeholder="Short Description" class="form-control" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" wire:model="short_description"></textarea>
                      </div>
                       <div class="box-body">
                        <h3 class="box-title">Description</h3>
                        <textarea placeholder="Description" class="form-control" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" wire:model="description"></textarea>
                       </div>
                     </div>
          
                     <div class="box-footer"><br/>
                      <button type="submit" class="btn btn-primary">Submit a logo</button>
                      <a href='/vector' class="btn btn-warning">Back</a>
                    </div>
                  </form>
                </div>
                <!-- /.box -->
          
                
              </div>
              <!-- /.col-->
            </div>
            <!-- ./row -->
          </section>
  <!-- /.content -->
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         
        </div>
        
      </div>
    </div>
  </div>
  <!--model popup-->
  <div style="height: 50px"></div>
</article>
</div>
<script>
    $(document).ready(function() {
      $(".select2").select2();
    });
  
  var link = $("#to-toggle");
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
  }
  </script>
  <script> 
    window.livewire.on('startDownload', path => {
        // open the download in a new tab/window to 
        // prevent livewire component from freezing
        window.open('download/' + path, '_blank');
    });
</script>
