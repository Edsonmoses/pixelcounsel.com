<?php

namespace App\Http\Livewire\Admin;

use App\Models\EventsCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditEventCategoryComponent extends Component
{
    public $event_slug;
    public $event_id;
    public $name;
    public $slug;

    public function mount($event_slug)
    {
        $this->event_slug = $event_slug;
        $event = EventsCategory::where('slug',$event_slug)->first();
        $this->event_id = $event->id;
        $this->name = $event->name;
        $this->slug = $event->slug;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateCategory()
    {
        $event = EventsCategory::find($this->event_id);
        $event->name = $this->name;
        $event->slug = $this->slug;
        $event->postedby = $this->postedby;
        $event->save();
        session()->flash('message','Event Category has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-event-category-component')->layout('layouts.backend');
    }
}
