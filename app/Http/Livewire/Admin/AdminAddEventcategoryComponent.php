<?php

namespace App\Http\Livewire\Admin;

use App\Models\EventsCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddEventcategoryComponent extends Component
{
    public $name;
    public $slug;
    public $postedby;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory()
    {
        $events = new EventsCategory();
        $events->name = $this->name;
        $events->slug = $this->slug;
        $events->postedby = $this->postedby;
        $events->save();
        session()->flash('message','Event Category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-eventcategory-component')->layout('layouts.backend');
    }
}
