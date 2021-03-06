<?php

namespace App\Http\Livewire;

use App\Models\Events;
use App\Models\EventsCategory;
use App\Models\EventType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class EventsCategoryComponent extends Component
{
    use WithPagination;

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

    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug)
    {
        $this->events_status = 'published';
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->$category_slug = $category_slug;
        $this->postedby = Auth::user()->name;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function addEvent()
    {
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
        session()->flash('message','Event has been submitted successfully!');
    }
    public function render()
    {
        $category = EventsCategory::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if($this->sorting =='date')
        {
            $events = Events::where('events_categories_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize,['*'],'events'); 
        }
        elseif($this->sorting =='price')
        {
            $events = Events::where('events_categories_id',$category_id)->orderBy('name','ASC')->paginate($this->pagesize,['*'],'events'); 
        }
        elseif($this->sorting =='price-desc')
        {
            $events = Events::where('events_categories_id',$category_id)->orderBy('name','DESC')->paginate($this->pagesize,['*'],'events'); 
        }
        else
        {
            $events = Events::whereDate('enddate','>=',Carbon::now())->orderBy('name','ASC')->paginate($this->pagesize,['*'],'events');
            $ads_events = Events::whereDate('enddate','>=',Carbon::now())->orderBy('name','ASC')->take(3)->get();
        }
        $eventcategories = EventsCategory::all()->sortBy('name');
        $eventtypes = EventType::all()->sortBy('name');
        return view('livewire.events-category-component',['events'=>$events,'eventcategories'=>$eventcategories,'category_name'=>$category_name, 'eventtypes'=>$eventtypes,'ads_events'=>$ads_events])->layout('layouts.baseapp');
    }
}
