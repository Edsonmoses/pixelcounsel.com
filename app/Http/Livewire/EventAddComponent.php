<?php

namespace App\Http\Livewire;

use App\Models\Events;
use App\Models\EventsCategory;
use App\Models\EventType;
use App\Models\User;
use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EventAddComponent extends Component
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
    public $postedby;
    public $confirm_status_at;

    public $searchTerm;
    public $totalRecords;
    public $loadAmount = 24;

    public function loadMore()
    {
        $this->loadAmount += 12;
    }

    public function mount()
    {
        if(Auth::check())
        {
        $this->events_status = 'unpublished';
        $this->postedby = Auth::user()->name;
        //use with account status
        $this->confirm_status_at = 1;
        }
        else
        {
            return redirect('/events')->with('success', 'Login to post an event!');
        }
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
            'ticket' => 'required',
            'enddate' => 'required',
        ]);
        if($this->images)
        {
            $this->validateOnly($fields,[
                'images' => 'required|mimes:png,jpg,jpeg,webp'
            ]);
        }
    }

    public function storeEvent()
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
            'ticket' => 'required',
            'enddate' => 'required',
        ]);
        if($this->images)
        {
            $this->validate([
                'images' => 'required|mimes:png,jpg,jpeg,webp'
            ]);
        }
        $event = new Events();
        $event->name = $this->name;
        $event->slug = $this->slug;
        $event->short_description = $this->short_description;
        $event->description = $this->description;
        $event->exhibition = $this->exhibition;
        $event->eventdate = $this->eventdate;
        $event->events_status = $this->events_status;
        $imageName = Carbon::now()->timestamp.'.'.$this->images->extension();
        $this->images->storeAs('events',$imageName);
        $event->images = $imageName;
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
        //session()->flash('success','Event has been submitted successfully!');
        //return redirect('/events/add');
    }

    public function updateConfirmation()
    {
        $user = User::find(Auth::user()->id);
        $user->confirm_status_at = $this->confirm_status_at;
        $user->save();
        return redirect('/vector');
    }


    public function render()
    {
        if (is_null(Auth::user()->confirm_status_at)) {
            $searchTerm = '%'.$this->searchTerm . '%';
            $vectorlogos = Vectorlogos::where('name','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('slug','LIKE',$searchTerm)
                    ->orWhere('description','LIKE',$searchTerm)
                    ->orWhere('designer','LIKE',$searchTerm)
                    ->orWhere('vtag','LIKE',$searchTerm)
                    ->orderBy('updated_at','ASC',$searchTerm)->paginate(15);
        $vectorcategories = VectorCategory::all()->sortBy('name');
            return view('livewire.user.account-status-component',['vectorcategories'=>$vectorcategories,'vectorlogos'=>$vectorlogos])->layout('layouts.baseapp');
        }else{
        $eventcategories = EventsCategory::all()->sortBy('name');
        $eventtypes = EventType::all()->sortBy('name');
        return view('livewire.event-add-component',['eventcategories'=>$eventcategories,'eventtypes'=>$eventtypes])->layout('layouts.baseapp');
        }
    }
}
