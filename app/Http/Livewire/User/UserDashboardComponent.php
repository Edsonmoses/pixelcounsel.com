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
        $eventsA = Events::where('postedby',Auth::user()->name)->where('events_status','published')->count();
        $pevents = Events::where('postedby',Auth::user()->name)->where('events_status','unpublished')->count();
        $count = Hookup::where('hookup_status','published')->whereDate('open','>=',Carbon::now())->count();
        $pcount = Hookup::where('hookup_status','unpublished')->whereDate('open','>=',Carbon::now())->count();
        $pendings = Vectorlogos::where('contributor',Auth::user()->name)->where('vector_status','unpublished')->count();
        $approveds = Vectorlogos::where('contributor',Auth::user()->name)->where('vector_status','published')->count();
        $approved = $approveds + $count + $eventsA;
        $pending = $pendings + $pcount + $pevents;
        return view('livewire.user.user-dashboard-component',['vectors'=>$vectors,'count'=>$count,'profile'=>$profile,'user'=>$user,'jobs'=>$jobs,'events'=>$events,'mvectors'=>$mvectors,'pending'=>$pending,'approved'=>$approved])->layout('layouts.userbackend');
    }
}
