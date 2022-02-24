<?php

namespace App\Http\Livewire\User;

use App\Models\Ads;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Vectorlogos;
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
        $count = Vectorlogos::where('contributor','=',Auth::user()->name)->count();
        return view('livewire.user.user-dashboard-component',['vectors'=>$vectors,'count'=>$count,'profile'=>$profile,'user'=>$user])->layout('layouts.userbackend');
    }
}
