<?php

namespace App\Http\Livewire\Admin;

use App\Models\HookupCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditHookupCategoryComponent extends Component
{
    public $hookup_slug;
    public $hookup_id;
    public $name;
    public $slug;

    public function mount($hookup_slug)
    {
        $this->hookup_slug = $hookup_slug;
        $hookup = HookupCategory::where('slug',$hookup_slug)->first();
        $this->hookup_id = $hookup->id;
        $this->name = $hookup->name;
        $this->slug = $hookup->slug;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug'=>'required|unique:categories'
        ]);
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug'=>'required|unique:categories'
        ]);
        $hookup = HookupCategory::find($this->hookup_id);
        $hookup->name = $this->name;
        $hookup->slug = $this->slug;
        $hookup->save();
        session()->flash('message','Hookup Category has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-hookup-category-component')->layout('layouts.backend');
    }
}
