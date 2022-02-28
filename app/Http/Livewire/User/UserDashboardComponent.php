<?php

namespace App\Http\Livewire\User;

use App\Models\Ads;
use App\Models\Events;
use App\Models\Hookup;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Vectorlogos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $profile = UserProfile::where('user_id',Auth::user()->id)->first();
        if(!$profile)
        {
            $profile = new UserProfile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }
        $user= User::find(Auth::user()->id);
        $vectors = Vectorlogos::where('contributor',Auth::user()->name)->orderBy('vector_status','ASC')->get();
        $newestCliente = Vectorlogos::orderBy('downloads', 'desc')->first();
        $mvectors = $newestCliente->downloads;
        $jobs = Hookup::where('postedby',Auth::user()->name)->orderBy('hookup_status','ASC')->get();
        $events = Events::where('postedby',Auth::user()->name)->orderBy('events_status','ASC')->get();
        $count = Hookup::where('hookup_status','published')->whereDate('open','>=',Carbon::now())->count();
        return view('livewire.user.user-dashboard-component',['vectors'=>$vectors,'count'=>$count,'profile'=>$profile,'user'=>$user,'jobs'=>$jobs,'events'=>$events,'mvectors'=>$mvectors])->layout('layouts.userbackend');
    }
}
