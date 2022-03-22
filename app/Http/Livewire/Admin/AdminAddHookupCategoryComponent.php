<?php

namespace App\Http\Livewire\Admin;

use App\Models\HookupCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddHookupCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function mount()
    {
        $this->events_status = 'unpublished';
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
        $hookup = new HookupCategory();
        $hookup->name = $this->name;
        $hookup->slug = $this->slug;
        $hookup->save();
        session()->flash('message','Hookup Category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-hookup-category-component')->layout('layouts.backend');
    }
}
