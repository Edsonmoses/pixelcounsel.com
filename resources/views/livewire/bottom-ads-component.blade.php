<div>
    <div class="col-lg-12 advert" style="padding-top: 31px;">
        @foreach ($vectorAds as $advert)
        @if ($advert->status == 0)
        @else
          @if ($advert->position == 4)
            <img class="bm-advert" src= "{{ asset('assets/images/advertis') }}/{{ $advert->image }}" alt="{{$advert->name}}" width="970"/>
          @endif
        @endif
        @endforeach
      </div>
</div>
