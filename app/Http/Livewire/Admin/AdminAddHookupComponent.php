<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hookup;
use App\Models\HookupCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddHookupComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $company;
    public $jobtitle;
    public $location;
    public $hookup_status;
    public $images;
    public $hookup_categories_id;

    public function mount()
    {
        $this->hookup_status = 'published';
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function addHookup()
    {
        $hookup = new Hookup();
        $hookup->name = $this->name;
        $hookup->slug = $this->slug;
        $hookup->short_description = $this->short_description;
        $hookup->description = $this->description;
        $hookup->company = $this->company;
        $hookup->jobtitle = $this->jobtitle;
        $hookup->location = $this->location;
        $hookup->hookup_status = $this->hookup_status;
        $imageName = Carbon::now()->timestamp.'.'.$this->images->extension();
        $this->images->storeAs('hookups',$imageName);
        $hookup->images = $imageName;
        $hookup->hookup_categories_id = $this->hookup_categories_id;
        $hookup->save();
        session()->flash('message','Hookup has been created successfully!');
    }
    public function render()
    {
        $hookupcategories = HookupCategory::all();
        return view('livewire.admin.admin-add-hookup-component',['hookupcategories'=>$hookupcategories])->layout('layouts.backend');
    }
}