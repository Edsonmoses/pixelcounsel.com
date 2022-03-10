<?php

namespace App\Http\Livewire\Admin;

use App\Models\VectorCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditVectorCategoryComponent extends Component
{
    public $vector_slug;
    public $vectorcategory_id;
    public $name;
    public $slug;
    public $postedby;

    public function mount($vector_slug)
    {
        $this->vector_slug = $vector_slug;
        $vectorcategory = VectorCategory::where('slug',$vector_slug)->first();
        $this->vectorcategory_id = $vectorcategory->id;
        $this->name = $vectorcategory->name;
        $this->slug = $vectorcategory->slug;
        $this->postedby = Auth::user()->name;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateVector()
    {
        $vectorcategory = VectorCategory::find($this->vectorcategory_id);
        $vectorcategory->name = $this->name;
        $vectorcategory->slug = $this->slug;
        $vectorcategory->postedby = $this->postedby;
        $vectorcategory->save();
        session()->flash('message','Vector Category has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-vector-category-component')->layout('layouts.backend');
    }
}
