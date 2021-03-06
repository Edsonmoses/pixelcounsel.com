<div>
    <div class="jargon-actives"><div class="jargon-arrows"></div></div>
<header class="intro-header intro-jargon">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <div class="heading-style">
                    <h1>JARGON BUSTER</h1>
                    <span class="sub-heading">A comprehensive dictionary of web, architecture, design and printing terms</span>
                </div>
            </div>
            <!--header title-->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 heading-mr">
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="  search-query form-control" placeholder="Search a term"  wire:model="searchTerm"/>
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!--row-->
    </div>
    <!--container-->
  </header>
	<!-- Main Content -->
	<div class="container">
		<div class="bottom-menu">
            <ul class="nav navbar-nav">
                @foreach ($jargoncategories as $j_catagory )
                    <li class="nav-link {{ route('jargon.category',['category_slug'=>$j_catagory->slug]) == url()->current() ? 'active' : '' }}">
                        <a href="{{ route('jargon.category',['category_slug'=>$j_catagory->slug]) }}">{{ $j_catagory->name}}
                        </a>
                    </li>
                @endforeach
			</ul>
		</div>
	</div>
		<div class="container">
            <div class="bottom-menu-2">
                <p style="margin: 20px 0 0 0; tra">Glossary of {{ $category_name }} Terms</p>
            <ul class="nav navbar-nav">
                  @foreach ($atributes as $atribute )
                <li class="nav-link{{ route('jargon.atributes', ['atributes_name'=>$atribute->name]) == url()->current('') ? 'active' : '' }} {{ $loop->first ? 'active' : '' }}">
                    <a href="{{ route('jargon.atributes',['atributes_name'=>$atribute->name]) }}">
                        {{ $atribute->name}}
                    </a>
                </li>
                @if ($loop->last)
                @else
                    <li class="divider nav-link">
                    <a href="#">|</a>
                </li>
                @endif
            @endforeach
            </ul>
            </div>
            <br/>
	    <div class="row" id="jargon">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    @foreach ( $af_jargons  as $jargon )
                    <p><strong>{{$jargon->name}} :</strong> {{$jargon->description}}</p>
                @endforeach
                </div>
	    </div>
	</div>
</div>
