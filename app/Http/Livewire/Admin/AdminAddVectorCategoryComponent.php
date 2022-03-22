<?php

namespace App\Http\Livewire\Admin;

use App\Models\VectorCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddVectorCategoryComponent extends Component
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

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug'=>'required'
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug'=>'required'
        ]);
        $vector = new VectorCategory();
        $vector->name = $this->name;
        $vector->slug = $this->slug;
        $vector->postedby = $this->postedby;
        $vector->save();
        session()->flash('message','Vector Category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-vector-category-component')->layout('layouts.backend');
    }
}
