<?php

namespace App\Http\Livewire\Admin;

use App\Models\AlpFilters;
use Livewire\Component;

class AdminAddAlpFilterComponent extends Component
{
    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
        ]);
    }

    public function storeAlpfilter()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $alpfilter = new AlpFilters();
        $alpfilter->name = $this->name;
        $alpfilter->save();
        session()->flash('message','Atribute has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-alp-filter-component')->layout('layouts.backend');
    }
}
