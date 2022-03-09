<?php

namespace App\Http\Livewire\User;

use App\Models\Events;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserEventComponent extends Component
{
    public function deleteEvent($id)
    {
        $event = Events::find($id);
        if($event->images)
        {
            unlink('assets/images/events'.'/'.$event->images);
        }
        if($event->image)
        {
            unlink('assets/images/events'.'/'.$event->image);
        }
        $event->delete();
        session()->flash('message','Event file has been deleted successfully!');
    }
    public function render()
    {
        $events = Events::where('postedby',Auth::user()->name)->orderBy('events_status','ASC')->paginate(10);
        return view('livewire.user.user-event-component',['events'=>$events])->layout('layouts.userbackend');
    }
}
