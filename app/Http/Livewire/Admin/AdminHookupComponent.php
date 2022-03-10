<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hookup;
use Livewire\Component;

class AdminHookupComponent extends Component
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
        $hookups = Hookup::paginate(20);
        return view('livewire.admin.admin-hookup-component',['hookups'=>$hookups])->layout('layouts.backend');
    }
}
