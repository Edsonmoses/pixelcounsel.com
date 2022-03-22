<?php

namespace App\Http\Livewire\User;

use App\Models\Events;
use App\Models\EventsCategory;
use App\Models\EventType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class UserEditEventComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $exhibition;
    public $eventdate;
    public $events_status;
    public $images;
    public $events_categories_id;
    public $etype_id;
    public $econtact;
    public $eventemail;
    public $ephone;
    public $website;
    public $ticket;
    public $enddate;
    public $newimage;
    public $event_id;
    public $postedby;

    public function mount($event_slug)
    {
        $event = Events::where('slug',$event_slug)->first();
        $this->name = $event->name;
        $this->slug = $event->slug;
        $this->short_description = $event->short_description;
        $this->description = $event->description;
        $this->exhibition = $event->exhibition;
        $this->eventdate = $event->eventdate;
        $this->events_status = $event->events_status;
        $this->images = $event->images;
        $this->events_categories_id = $event->events_categories_id;
        $this->etype_id = $event->etype_id;
        $this->econtact = $event->econtact;
        $this->eventemail = $event->eventemail;
        $this->ephone = $event->ephone;
        $this->website = $event->website;
        $this->ticket = $event->ticket;
        $this->enddate = $event->enddate;
        $this->event_id = $event->id;
        $this->postedby = Auth::user()->name;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:events',
            'short_description' => 'required',
            'description' => 'required',
            'exhibition' => 'required',
            'eventdate' => 'required',
            'events_status' => 'required',
            'events_categories_id' => 'required',
            'etype_id' => 'required',
            'econtact' => 'required',
            'eventemail' => 'required',
            'ephone' => 'required',
            'website' => 'required',
            'ticket' => 'required',
            'enddate' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }
    }


    public function updateEvent()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:events',
            'short_description' => 'required',
            'description' => 'required',
            'exhibition' => 'required',
            'eventdate' => 'required',
            'events_status' => 'required',
            'events_categories_id' => 'required',
            'etype_id' => 'required',
            'econtact' => 'required',
            'eventemail' => 'required',
            'ephone' => 'required',
            'website' => 'required',
            'ticket' => 'required',
            'enddate' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }
        $event = Events::find($this->event_id);
        $event->name = $this->name;
        $event->slug = $this->slug;
        $event->short_description = $this->short_description;
        $event->description = $this->description;
        $event->exhibition = $this->exhibition;
        $event->eventdate = $this->eventdate;
        $event->events_status = $this->events_status;
        if($this->newimage)
        {
        $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
        $this->newimage->storeAs('events',$imageName);
        $event->images = $imageName;
        }
        $event->events_categories_id = $this->events_categories_id;
        $event->etype_id = $this->etype_id;
        $event->econtact = $this->econtact;
        $event->eventemail = $this->eventemail;
        $event->ephone = $this->ephone;
        $event->website = $this->website;
        $event->ticket = $this->ticket;
        $event->enddate = $this->enddate;
        $event->postedby = $this->postedby;
        $event->save();
        session()->flash('message','Event has been updated successfully!');
    }
    public function render()
    {
        $eventcategories = EventsCategory::all()->sortBy('name');
        $eventtypes = EventType::all()->sortBy('name');
        return view('livewire.user.user-edit-event-component',['eventcategories'=>$eventcategories,'eventtypes'=>$eventtypes])->layout('layouts.userbackend');
    }
}
