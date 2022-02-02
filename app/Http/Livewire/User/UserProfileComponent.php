<?php

namespace App\Http\Livewire\User;

use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfileComponent extends Component
{
    public function render()
    {
        $uprofile = UserProfile::where('user_id',Auth::user()->id)->first();
        //dd($uprofile);
        return view('livewire.user.user-profile-component',['uprofile'=>$uprofile])->layout('layouts.backend');
    }
}
