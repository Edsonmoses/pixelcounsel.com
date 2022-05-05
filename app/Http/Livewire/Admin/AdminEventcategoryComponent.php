<?php

namespace App\Http\Livewire\Admin;

use App\Models\EventsCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminEventcategoryComponent extends Component
{
    use WithPagination;

    public function deleteEvent($id)
    {
        $event = EventsCategory::find($id);
        $event->delete();
        session()->flash('message','Event Category has been deleted successfully!');
    }

    public function render()
    {
        $events = EventsCategory::paginate(20,['*'],'event');
        return view('livewire.admin.admin-eventcategory-component',['events'=>$events])->layout('layouts.backend');
    }
}
