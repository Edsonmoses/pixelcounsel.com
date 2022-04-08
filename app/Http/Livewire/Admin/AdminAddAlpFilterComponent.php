<?php

namespace App\Http\Livewire\Admin;

use App\Models\AlpFilters;
use App\Models\JargonCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminAddAlpFilterComponent extends Component
{
    public $name;
    public $postedby;
    public $category_id;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
    }

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

        if($this->category_id)
        {
            $alpfilter = new AlpFilters();
            $alpfilter->name = $this->name;
            $alpfilter->postedby = $this->postedby;
            $alpfilter->category_id = $this->category_id;
            $alpfilter->save();
            session()->flash('message','Atribute has been created successfully!');
        }
        else
        {
            $alpfilter = new AlpFilters();
            $alpfilter->name = $this->name;
            $alpfilter->postedby = $this->postedby;
            $alpfilter->save();
            session()->flash('message','Atribute has been created successfully!');
        }
    }
    public function render()
    {
        $categories = JargonCategory::all();
        return view('livewire.admin.admin-add-alp-filter-component',['categories'=>$categories])->layout('layouts.backend');
    }
}
