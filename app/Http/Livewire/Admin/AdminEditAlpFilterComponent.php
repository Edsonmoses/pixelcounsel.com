<?php

namespace App\Http\Livewire\Admin;

use App\Models\AlpFilters;
use App\Models\JargonCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminEditAlpFilterComponent extends Component
{
    public $alpfilter_id;
    public $name;
    public $category_id;

    public function mount($name,$category_id=NULL)
    {
        if($this->category_id)
        {
            $alpfilter = AlpFilters::where('category_id',$category_id)->first();
            $this->alpfilter_id = $alpfilter->id;
            $this->name = $alpfilter->name;
            $this->category_id = $alpfilter->category_id;
        }else
        {
            $alpfilter = AlpFilters::where('name',$name)->first();
            $this->alpfilter_id = $alpfilter->id;
            $this->name = $alpfilter->name;
            $this->category_id = $alpfilter->category_id;
        }
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

        if($this->category_id)
        {
            $alpfilter = AlpFilters::find($this->alpfilter_id);
            $alpfilter->name = $this->name;
            $alpfilter->category_id = $this->category_id;
            $alpfilter->save();
            session()->flash('message','Atribute has been created successfully!');
        }
        else
        {
            $alpfilter = AlpFilters::find($this->alpfilter_id);
            $alpfilter->name = $this->name;
            $alpfilter->save();
            session()->flash('message','Atribute has been created successfully!');
        }
    }
    public function render()
    {
        $categories = JargonCategory::all();
        return view('livewire.admin.admin-edit-alp-filter-component',['categories'=>$categories])->layout('layouts.backend');
    }
}
