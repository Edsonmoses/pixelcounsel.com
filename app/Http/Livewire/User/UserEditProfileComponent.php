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

    public $name;
    public $email;
    public $image;
    public $phone;
    public $about;
    public $city;
    public $locations;
    public $newimage;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
       $this->name = $user->name;
       $this->email = $user->email;
       $this->image = $user->profile->image;
       $this->phone = $user->profile->phone;
       $this->about = $user->profile->about;
       $this->city = $user->profile->city;
       $this->locations = $user->profile->locations;
    }

    public function updateProfile()
    {
        $user = User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->save();

        if($this->newimage)
        {
            if($this->image)
            {
                unlink('assets/images/profiles/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('profiles',$imageName);
            $user->profile->image = $imageName;
        }
        $user->profile->phone = $this->phone;
        $user->profile->about = $this->about;
        $user->profile->city = $this->city;
        $user->profile->locations = $this->locations;
        $user->profile->save();
        session()->flash('message','Profile has been updated successfully!');
    }

    public function render()
    {
        $user= User::find(Auth::user()->id);
        return view('livewire.user.user-edit-profile-component',['user'=>$user])->layout('layouts.backend');
    }
}
