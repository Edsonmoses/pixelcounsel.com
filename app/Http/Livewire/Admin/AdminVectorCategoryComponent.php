<?php

namespace App\Http\Livewire\Admin;

use App\Models\VectorCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminVectorCategoryComponent extends Component
{
    use WithPagination;

    public function deleteVector($id)
    {
        $vector = VectorCategory::find($id);
        $vector->delete();
        session()->flash('message','Vector Category has been deleted successfully!');
    }
    public function render()
    {
        $vectors = VectorCategory::paginate(20);
        return view('livewire.admin.admin-vector-category-component',['vectors'=>$vectors])->layout('layouts.backend');
    }
}
