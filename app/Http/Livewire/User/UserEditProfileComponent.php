<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
    use WithFileUploads;

    public $user_profile_id;
    public $image;
    public $about;
    public $city;
    public $locations;
    public $newimage;

    public function mount()
    {
        $uprofile = UserProfile::where('user_id',Auth::user()->id)->first();
        $this->user_profile_id = $uprofile->id;
        $this->image = $uprofile->image;
        $this->about = $uprofile->about;
        $this->city = $uprofile->city;
        $this->locations = $uprofile->locations;
    }

    public function updateProfile()
    {
        $uprofile = UserProfile::where('user_id',Auth::user()->id)->first();
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('profiles',$imageName);
            $uprofile->image = $imageName;
        }
        $uprofile->about = $this->about;
        $uprofile->city = $this->city;
        $uprofile->user_profile_id = $this->id;
        $uprofile->locations = $this->locations;
        $uprofile->save();
        session()->flash('message','Profile has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.user.user-edit-profile-component')->layout('layouts.backend');
    }
}
