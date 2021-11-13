<?php

namespace App\Http\Livewire\Admin;

use App\Models\AlpFilters;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAlpFilterComponent extends Component
{
    use WithPagination;

    public function deleteAlpFilter($id)
    {
        $alpfilter = AlpFilters::find($id);
        $alpfilter->delete();
        session()->flash('message','Category has been deleted successfully!');
    }
    public function render()
    {
        $alpfilters = AlpFilters::paginate(10);
         return view('livewire.admin.admin-alp-filter-component',['alpfilters'=>$alpfilters])->layout('layouts.backend');
    }
}
