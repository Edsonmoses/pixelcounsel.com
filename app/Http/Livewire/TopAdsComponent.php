<?php

namespace App\Http\Livewire;

use App\Models\Ads;
use Carbon\Carbon;
use Livewire\Component;

class TopAdsComponent extends Component
{
    public function render()
    {
        $vectorAds = Ads::where('position',1)->where('endate','>=',Carbon::today())->get();
        return view('livewire.top-ads-component',['vectorAds'=>$vectorAds]);
    }
}
