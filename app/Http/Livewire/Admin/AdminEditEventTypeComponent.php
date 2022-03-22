<?php

namespace App\Http\Livewire\Admin;

use App\Models\EventType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditEventTypeComponent extends Component
{
    public $etype_slug;
    public $etype_id;
    public $name;
    public $slug;

    public function mount($etype_slug)
    {
        $this->etype_slug = $etype_slug;
        $etype = EventType::where('slug',$etype_slug)->first();
        $this->etype_id = $etype->id;
        $this->name = $etype->name;
        $this->slug = $etype->slug;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug'=>'required|unique:categories'
        ]);
    }

    public function updateType()
    {
        $this->validate([
            'name' => 'required',
            'slug'=>'required|unique:categories'
        ]);
        $etype = EventType::find($this->etype_id);
        $etype->name = $this->name;
        $etype->slug = $this->slug;
        $etype->save();
        session()->flash('message','Event Type has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-event-type-component')->layout('layouts.backend');
    }
}
