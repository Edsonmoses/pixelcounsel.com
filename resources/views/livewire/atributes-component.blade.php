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
                <p style="margin: 20px 0 0 0;">Glossary of Architectural Terms</p>
            <ul class="nav navbar-nav">
                @foreach ($atributes as $atribute )
                <li class="nav-link {{ route('jargon.atributes', ['atributes_name'=>$atribute->name]) == url()->current() ? 'active' : '' }}">
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
            {{--<select name="orderby" wire:model="sorting">
                <option value="default">Default sorting</option>
                <option value="date">Sort by newness</option>
                <option value="price">Sort by price: low to high</option>
                <option value="price-desc">Sort by price: high to low</option>
            </select>
            <select name="post-per-page" wire:model="pagesize">
                <option value="12">12 per page</option>
                <option value="3">3 per page</option>
                <option value="2">2 per page</option>
                <option value="1">1 per page</option>
            </select>--}}
            <div class="col-lg-12 col-md-12 col-sm-12">
                @foreach ( $jargons  as $jargon )
                    <p><strong>{{$jargon->name}} :</strong> {{$jargon->description}}</p>
                @endforeach
            </div>
      </div>
  </div>
  </div>
  