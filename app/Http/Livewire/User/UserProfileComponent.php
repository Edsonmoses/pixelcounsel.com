<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfileComponent extends Component
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
        return view('livewire.user.user-profile-component',['profile'=>$profile,'user'=>$user])->layout('layouts.userbackend');
    }
}
