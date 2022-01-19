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
                    <input type="text" class="  search-query form-control" placeholder="Find a logo"  wire:model="searchTerm"/>
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button">
                            <span class=" glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>
            </div>
            <div class="col-lg-6 col-md-6 vector-s-btn text-right">
            
            </div>
            
        </div>
    </div>
</header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="rounded shadow bg-white p-4">
                    <div class="custom-form" style="margin: 0 35px 0 15px !important">
                        @if (Session::has('message'))
                                <div class="alert alert-success" id="message3" role="alert">{{ Session::get('message') }}</div>
                             @endif
                        <form class="form-horizontal" wire:submit.prevent="addVector" files="true" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Vector Name</label>
                                        <input type="text" placeholder="Vector Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                                         @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Vector Slug</label>
                                        <input type="text" placeholder="Vector Slug" class="form-control input-md" wire:model="slug"/>
                                        @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Short Description</label>
                                        <textarea placeholder="Short Description" id="short_description" class="form-control" wire:model="short_description"></textarea>
                                        @error('short_description')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Vector Format</label>
                                        <select class="form-control" wire:model="format">
                                            <option value="ai">AI</option>
                                            <option value="eps">EPS</option>
                                            <option value="pdf">PDF</option>
                                        </select>
                                        @error('format')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Designer</label>
                                        <input type="text" placeholder="Designer" class="form-control input-md" wire:model="designer">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2 mr-2">
                                        <label class="text-muted">Vector File</label>
                                        <input type="file" class="form-control input-file" wire:model="images">
                                        @error('images')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Vector Preview</label>
                                        <input type="file" class="form-control input-file" wire:model="image">
                                        @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120"/>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Vector Category</label>
                                        <select class="form-control" wire:model="vector_categories_id">
                                            <option value="">Select Vector Category</option>
                                            @foreach ( $vectorcategories as $category )
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('vector_categories_id')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group app-label mt-2">
                                        <label class="text-muted">Vector Description</label>
                                        <textarea placeholder="Vector Description" id="description" class="form-control" wire:model="description"></textarea>
                                        @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mt-2">
                                    <a href="#" class="btn btn-primary">Post a vector</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>