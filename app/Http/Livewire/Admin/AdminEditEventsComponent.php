<?php

namespace App\Http\Livewire\Admin;

use App\Models\Events;
use App\Models\EventsCategory;
use App\Models\EventType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditEventsComponent extends Component
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
    public $approved;

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
        $this->approved = '1';
    }

    public function generateSlug()
    {
        $placeObj = new Events();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $eventsNameURL = strtolower($final_slug);

        $this->slug = Str::slug($eventsNameURL);
         //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($eventsNameURL)->exists();

        if($checkSlug){
            //Slug already exists.

            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;

            while(1){
                //Check if Slug with final prefix exists.
                
                $newSlug = $eventsNameURL."-".$numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
                $newSlug = Str::slug($newSlug); //String Slug


                $checkSlug = $placeObj->whereSlug($newSlug)->exists(); //Check if already exists in DB
                //This returns true if exists.

                if(!$checkSlug){

                    //There is not more coincidence. Finally found unique slug.
                    $this->slug = $newSlug; //New Slug 

                    break; //Break Loop
                
                }


            }

        }else{
            //Slug do not exists. Just use the selected Slug.
            $this->slug = $eventsNameURL;
        }
    }

    /*public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'exhibition' => 'required',
            'eventdate' => 'required',
            'events_status' => 'required',
            'images' => 'required|mimes:png,jpg,jpeg,webp',
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
                'newimage' => 'required|mimes:jpeg,png,jpg,webp',
            ]);
        }
    }*/

    public function updateEvent()
    {
       /* $this->validate([
            'name' => 'required',
            'slug' => 'required',
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
                'newimage' => 'required|mimes:jpeg,png,jpg,webp',
            ]);
        }*/
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
        $event->approved = $this->approved;
        $event->save();
        session()->flash('message','Event has been updated successfully!');
    }
    public function render()
    {
        $eventcategories = EventsCategory::all();
        $eventtypes = EventType::all();
        return view('livewire.admin.admin-edit-events-component',['eventcategories'=>$eventcategories,'eventtypes'=>$eventtypes])->layout('layouts.backend');
    }
}
