<?php

namespace App\Http\Livewire\Admin;

use App\Models\JargonCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminJargonCategoryComponent extends Component
{
    use WithPagination;
    public function deleteJargon($id)
    {
        $jargon = JargonCategory::find($id);
        $jargon->delete();
        session()->flash('message','Jargon Category has been deleted successfully!');
    }
    public function render()
    {
        $jargons = JargonCategory::paginate(5);
        return view('livewire.admin.admin-jargon-category-component',['jargons'=>$jargons])->layout('layouts.backend');
    }
}
