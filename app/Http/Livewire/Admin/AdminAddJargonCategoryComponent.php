<?php

namespace App\Http\Livewire\Admin;

use App\Models\JargonCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddJargonCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory()
    {
        $jargon = new JargonCategory();
        $jargon->name = $this->name;
        $jargon->slug = $this->slug;
        $jargon->save();
        session()->flash('message','Jargon Category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-jargon-category-component')->layout('layouts.backend');
    }
}
