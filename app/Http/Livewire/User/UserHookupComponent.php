<?php

namespace App\Http\Livewire\User;

use App\Models\Hookup;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserHookupComponent extends Component
{
    public function deleteVector($id)
    {
        $hookup = Hookup::find($id);
        if($hookup->images)
        {
            unlink('assets/images/hookups'.'/'.$hookup->images);
        }
        if($hookup->image)
        {
            unlink('assets/images/hookups'.'/'.$hookup->image);
        }
        $hookup->delete();
        session()->flash('message','Hookup file has been deleted successfully!');
    }
    public function render()
    {
        $jobs = Hookup::where('postedby',Auth::user()->name)->orderBy('hookup_status','ASC')->paginate(100,['*'],'jobs');
        return view('livewire.user.user-hookup-component',['jobs'=>$jobs])->layout('layouts.userbackend');
    }
}
