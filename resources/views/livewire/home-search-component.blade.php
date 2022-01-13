<div style="margin:-50px 0 33px 0">
    <div id="custom-search-input">
        <div class="input-group col-md-12">
            <input type="text" class="  search-query form-control" placeholder="Online vector logo collection of brands in Africa"  wire:model="search"/>
            <span class="input-group-btn">
                <button class="btn btn-danger" type="button">
                    <span class=" glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </div>
    @if ($search)
    <ul class="hmsearch">
        @foreach($vector as $vector)
            <li><a href="{{ route('vector.vectors',['slug'=>$vector->slug]) }}">{{ $vector->name }}</a></li>
        @endforeach
    </ul>
    @endif
</div>
