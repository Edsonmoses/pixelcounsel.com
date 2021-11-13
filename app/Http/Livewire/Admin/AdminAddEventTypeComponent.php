<?php

namespace App\Http\Livewire\Admin;

use App\Models\EventType;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddEventTypeComponent extends Component
{
    public $name;
    public $slug;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeType()
    {
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
