<div>
    @foreach ($vectorAds as $advert)
    @if ($advert->status == 0)
      @else
          @if ($advert->position == 2)
            <img class="lt-advert" src= "{{ asset('assets/images/advertis') }}/{{ $advert->image }}" alt="{{$advert->name}}" width="250"/>
          @endif
        @endif
    @endforeach
</div>
