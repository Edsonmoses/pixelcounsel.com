<?php

namespace App\Http\Livewire\User;

use App\Models\Vectorlogos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserVectorComponent extends Component
{
    public function deleteVector($id)
    {
        $vector = Vectorlogos::find($id);
        if($vector->images)
        {
            unlink('assets/images/vectors'.'/'.$vector->images);
        }
        if($vector->image)
        {
            unlink('assets/images/vectors'.'/'.$vector->image);
        }
        $vector->delete();
        session()->flash('message','Vector file has been deleted successfully!');
    }
    public function render()
    {
        $vectors = Vectorlogos::where('vector_status','published')->where('contributor',Auth::user()->name)->orderBy('created_at','DESC')->paginate(100,['*'],'vectors');
        return view('livewire.user.user-vector-component',['vectors'=>$vectors])->layout('layouts.userbackend');
    }
}
