<?php

namespace App\Http\Livewire\Admin;

use App\Models\EventType;
use Livewire\Component;
use Livewire\WithPagination;

class AdminEventTypeComponent extends Component
{
    use WithPagination;

    public function deleteEvent($id)
    {
        $etype = EventType::find($id);
        $etype->delete();
        session()->flash('message','Event Category has been deleted successfully!');
    }
    public function render()
    {
        $eventtypes = EventType::orderBy('created_at','DESC')->paginate(20,['*'],'eventtype');
        return view('livewire.admin.admin-event-type-component',['eventtypes'=>$eventtypes])->layout('layouts.backend');
    }
}
