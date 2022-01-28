<div>
    <div class="col-lg-12 advert">
        @foreach ($vectorAds as $advert)
        @if ($advert->status == 0)
        @else
            @if ($advert->position == 1)
            <img class="tp-advert" src= "{{ asset('assets/images/advertis') }}/{{ $advert->image }}" alt="{{$advert->name}}" width="970"/>
            @endif
        @endif
        @endforeach
      </div>
</div>
