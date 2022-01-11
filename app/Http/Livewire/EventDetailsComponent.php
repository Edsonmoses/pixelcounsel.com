<?php

namespace App\Http\Livewire;

use App\Models\Events;
use Livewire\Component;

class EventDetailsComponent extends Component
{
    public $event_slug;

    public function mount($event_slug)
    {
        $this->event_slug = $event_slug;
    }

    public function render()
    {
        $event = Events::where('slug',$this->event_slug)->orderBy('name','ASC')->first();
        return view('livewire.event-details-component',['event'=>$event])->layout('layouts.baseapp');
    }
}
