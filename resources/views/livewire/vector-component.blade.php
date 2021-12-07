<div>
 
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
                  <a class="btn btn-vector v-single" href="#" role="button" data-toggle="modal" data-target="#logoModal">SUBMIT A LOGO</a>
                </div>
            </div>
        </div>
    </header>
    <header class="intro-header intro-header-vector-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
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
                <div class="col-lg-6 col-md-6">
                    
                </div>
                
            </div>
        </div>
    </header>
        <!-- Main Content -->
        <div class="container">
            
            <div class="row" id="vector" wire:loading.delay.class="opacity-50">
              @foreach ($vectorlogos as $vector)
                <div class="col-md-2 col-sm-2 col-lg-2 vector-img ml-1" @if ($loop->last) id="last_record" @endif>
                  <a href="{{ route('vector.vectors',['slug'=>$vector->slug]) }}"><img class="bd-placeholder-img" src="{{ asset('assets/images/vectors') }}/{{ $vector->image }}" alt="{{ $vector->name }}"  width="100%" height="225"></a>
                </div>
                @endforeach
            </div>
            @if ($loadAmount >= $totalRecords)
                  <p class="text-gray-800 font-bold text-2xl text-center my-10">No Remaining Records!</p>
              @endif
          </div>
    <div class="container">
    
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
            <form class="form-horizontal" wire:submit.prevent="addVector" files="true" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="row">
                  <div class="col-md-5" style="margin: 0 35px 0 15px !important">
                        <div class="form-group">
                          <label for="name">Vector Name</label>
                          <input type="text" placeholder="Vector Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
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
                            <img src="{{ asset('assets/image/vectors')}}/{{ $image}}" width="120"/>
                        @endif
                    </div>
                      <div class="form-group">
                          <label for="vectors_thumbnail">Vector Category</label>
                          <select class="form-control" wire:model="vector_categories_id" wire:ignore>
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
    <div class="row">
      <div class="col-lg-4 col-md-4 ">
        <div class="vector-search" style="margin:18px 0 0 0">
            <form action="#" role="search">
                
            <div class="input-group">
            <input class="form-control" placeholder="Find a vector logo" name="query" id="ed-srch-term" type="text" wire:model="searchTerm">
            <div class="input-group-btn">
            <button type="submit" id="searchbtn">
                <i class="fa fa-search" aria-hidden="true"></i> </button>
            </div>
            </div>
            </form>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 vector-s-btn text-right">
        <a class="btn btn-vector v-single" href="#" role="button" data-toggle="modal" data-target="#logoModal">SUBMIT A LOGO</a>
      </div>
    </div>
        </div>
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