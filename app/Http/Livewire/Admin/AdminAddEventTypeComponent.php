<?php

namespace App\Http\Livewire\Admin;

use App\Models\EventType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddEventTypeComponent extends Component
{
    public $name;
    public $slug;

    public function mount()
    {
        $this->events_status = 'unpublished';
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug'=>'required'
        ]);
    }

    public function storeType()
    {
        $this->validate([
            'name' => 'required',
            'slug'=>'required'
        ]);
        $etype = new EventType();
        $etype->name = $this->name;
        $etype->slug = $this->slug;
        $etype->save();
        session()->flash('message','Event Type has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-event-type-component')->layout('layouts.backend');
    }
}
