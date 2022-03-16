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
        $this->events_status = 'unpublished';
        $this->postedby = Auth::user()->name;
        //use with account status
        $this->confirm_status_at = 1;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function storeEvent()
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
