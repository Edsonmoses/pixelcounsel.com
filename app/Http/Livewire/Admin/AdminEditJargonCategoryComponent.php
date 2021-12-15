<?php

namespace App\Http\Livewire\Admin;

use App\Models\JargonCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditJargonCategoryComponent extends Component
{
    public $jargon_slug;
    public $jargon_id;
    public $name;
    public $slug;

    public function mount($jargon_slug)
    {
        $this->jargon_slug = $jargon_slug;
        $jargon = JargonCategory::where('slug',$jargon_slug)->first();
        $this->jargon_id = $jargon->id;
        $this->name = $jargon->name;
        $this->slug = $jargon->slug;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateCategory()
    {
        $jargon = JargonCategory::find($this->jargon_id);
        $jargon->name = $this->name;
        $jargon->slug = $this->slug;
        $jargon->save();
        session()->flash('message','Jargon Category has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-jargon-category-component')->layout('layouts.backend');
    }
}
