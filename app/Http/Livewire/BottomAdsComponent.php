<?php

namespace App\Http\Livewire;

use App\Models\Ads;
use Carbon\Carbon;
use Livewire\Component;

class BottomAdsComponent extends Component
{
    public function render()
    {
        $vectorAds = Ads::where('position',4)->where('endate','<=',Carbon::today())->get();
        return view('livewire.bottom-ads-component',['vectorAds'=>$vectorAds]);
    }
}
