<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jargons;
use Livewire\Component;
use Livewire\WithPagination;

class AdminJargonComponent extends Component
{
    use WithPagination;

    public function deleteJargon($id)
    {
        $jargon = Jargons::find($id);
        $jargon->delete();
        session()->flash('message','Jargon has been deleted successfully!');
    }

    public function render()
    {
        $jargons = Jargons::paginate(20,['*'],'jargon');
        return view('livewire.admin.admin-jargon-component',['jargons'=>$jargons])->layout('layouts.backend');
    }
}
