<?php

namespace App\Http\Livewire;

use App\Models\Ads;
use Carbon\Carbon;
use Livewire\Component;

class RightAdsComponent extends Component
{
    public function render()
    {
        $vectorAds = Ads::where('position',3)->where('endate','<=',Carbon::today())->get();
        return view('livewire.right-ads-component',['vectorAds'=>$vectorAds]);
    }
}
