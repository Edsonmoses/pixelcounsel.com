<?php

namespace App\Http\Livewire\User;

use App\Models\Ads;
use App\Models\Vectorlogos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $vectors = Vectorlogos::where('contributor',Auth::user()->name)->orderBy('vector_status','ASC')->get();
        $count = Vectorlogos::where('contributor','=',Auth::user()->name)->count();
        return view('livewire.user.user-dashboard-component',['vectors'=>$vectors,'count'=>$count])->layout('layouts.userbackend');
    }
}
