<?php

namespace App\Http\Livewire\Admin;

use App\Models\JargonCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddJargonCategoryComponent extends Component
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
        $jargon = new JargonCategory();
        $jargon->name = $this->name;
        $jargon->slug = $this->slug;
        $jargon->postedby = $this->postedby;
        $jargon->save();
        session()->flash('message','Jargon Category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-jargon-category-component')->layout('layouts.backend');
    }
}
