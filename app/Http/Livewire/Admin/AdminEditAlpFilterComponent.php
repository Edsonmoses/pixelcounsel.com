<?php

namespace App\Http\Livewire\Admin;

use App\Models\AlpFilters;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminEditAlpFilterComponent extends Component
{
    public $alpfilter_id;
    public $name;
    public $postedby;

    public function mount($name)
    {
        $alpfilter = AlpFilters::where('name',$name)->first();
        $this->alpfilter_id = $alpfilter->id;
        $this->name = $alpfilter->name;
        $this->postedby = Auth::user()->name;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
        ]);
    }

    public function updateAlpfilter()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $alpfilter = AlpFilters::find($this->alpfilter_id);
        $alpfilter->name = $this->name;
        $alpfilter->postedby = $this->postedby;
        $alpfilter->save();
        session()->flash('message','Atribute has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-alp-filter-component')->layout('layouts.backend');
    }
}
