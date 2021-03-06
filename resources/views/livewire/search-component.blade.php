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
                  <a class="btn btn-vector v-single" href="#" role="button" data-toggle="modal" data-target="#logoModal">SUBMIT A LOGO</a>
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
                <div class="col-lg-8 col-md-8">
                  <div id="custom-search-input" style="margin-top: 33px">
                    <div class="input-group col-md-12">
                        <input type="text" class="  search-query form-control" placeholder="Find a logo"  wire:model="searchTerm"/>
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-4 vector-s-btn">
                   
                </div>
                
            </div>
        </div>
    </header>
        <!-- Main Content -->
        <div class="container">
            <div class="container">
            <div class="row" id="vector" id="post-data">
            @if ($vector->count()>0)
                @foreach ($vector as $vector)
              
                <div class="col-md-4 vector-img ml-1">
                  <a href="{{ route('vector.vectors',['slug'=>$vector->slug]) }}"><img class="bd-placeholder-img" src="{{ asset('assets/images/vectors') }}/{{ $vector->image }}" alt="{{ $vector->name }}"  width="100%" height="225"></a>
                </div>
                @endforeach
            @else
                <p>No vectors</p>
            @endif
	    </div>
 <!-- The Modal -->
 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="logoModal">
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
  <section class="content">
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
                    </select>
                  </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="vectors_image">Vector File</label>
                        <input type="file" class="form-control input-file" wire:model="images">
                        @if($images)
                            <img src="{{ $images->temporaryUrl() }}" width="120"/>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="vectors_thumbnail">Vector Category</label>
                        <select class="form-control" wire:model="vector_categories_id">
                          <option value="">Select Vector Category</option>
                          @foreach ( $vectorcategories as $category )
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                    </div>
                  <div class="form-group">
                      <label for="contributor">Contributor</label>
                      <input type="text" class="form-control" id="contributor" name="contributor" value="" placeholder="contributor">
                  </div><br/><br/>
                  
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
      </div>
      </div>
