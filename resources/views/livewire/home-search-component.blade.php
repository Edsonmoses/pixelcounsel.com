<div class="vector-search">
    <form action="#" role="search">

    <div class="input-group">
    <input class="form-control" placeholder="Online vector logo collection of brands in Africa" name="query" id="ed-srch-term" type="search" wire:model="search">
    <div class="input-group-btn">
    <button type="submit" id="searchbtn">
        <i class="fa fa-search" aria-hidden="true"></i> </button>
    </div>
    </div>
    </form>
    @if ($search)
    <ul class="hmsearch">
        @foreach($vector as $vector)
            <li><a href="{{ route('vector.vectors',['slug'=>$vector->slug]) }}">{{ $vector->name }}</a></li>
        @endforeach
    </ul>
    @endif
</div>
