<?php

namespace App\Http\Livewire;

use App\Models\Ads;
use Carbon\Carbon;
use Livewire\Component;

class LeftAdsComponent extends Component
{
    public function render()
    {
        $vectorAds = Ads::where('position',2)->where('endate','<=',Carbon::today())->get();
        return view('livewire.left-ads-component',['vectorAds'=>$vectorAds]);
    }
}
