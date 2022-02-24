<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserSettingComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;
    public $email;
    public $utype;

    public function mount()
    {
        $this->email = 'disable@pixelcounsel.com';
        $this->utype = 'disable';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password'
        ]);
    }

    public function changePassword()
    {
        $this->validate([
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password'
        ]);

        if(Hash::check($this->current_password,Auth::user()->password))
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('password_success','Password has been changed sucessfully!');
        }
        else
        {
            session()->flash('password_error','Password does not match!');
        }
    }

    public function Disable()
    {
            $user = User::find(Auth::user()->id);
            $user->utype = $this->utype;
            $user->email = $this->email;
            $user->save();
    }
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
        return view('livewire.user.user-setting-component',['profile'=>$profile,'user'=>$user])->layout('layouts.userbackend');
    }
}
