<?php

namespace App\Http\Livewire\Admin;

use App\Models\Events;
use Livewire\Component;

class AdminEventsComponent extends Component
{
    public $selected = [];

    public function activate()
    {
        if (!empty($this->selected)) {
            Events::whereIn('id', $this->selected)->update(['events_status' => 'published']);
            $this->selected = [];
        }
    }
    public function deleteEvent($id)
    {
        $event = Events::find($id);
        $event->delete();
        session()->flash('message', 'Vector file has been deleted successfully!');
    }

    public function render()
    {
        $events = Events::orderBy('created_at', 'DESC')->paginate(20, ['*'], 'event');
        return view('livewire.admin.admin-events-component', ['events' => $events])->layout('layouts.backend');
    }
}
