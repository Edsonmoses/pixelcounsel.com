<?php

namespace App\Http\Livewire\Admin;

use App\Models\VectorCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddVectorCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory()
    {
        $vector = new VectorCategory();
        $vector->name = $this->name;
        $vector->slug = $this->slug;
        $vector->save();
        session()->flash('message','Vector Category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-vector-category-component')->layout('layouts.backend');
    }
}
