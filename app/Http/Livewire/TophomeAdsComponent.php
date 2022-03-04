<?php

namespace App\Http\Livewire;

use App\Models\Ads;
use Carbon\Carbon;
use Livewire\Component;

class TophomeAdsComponent extends Component
{
    public function render()
    {
        $tophomeAds = Ads::where('position',5)->where('endate','>=',Carbon::today())->where('status',1)->get();
       // dump($tophomeAds);
        return view('livewire.tophome-ads-component',['tophomeAds'=>$tophomeAds]);
    }
}
