<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hookup;
use App\Models\HookupCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditHookupComponent extends Component
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
    public $newimage;
    public $hookup_id;

    public function mount($hookup_slug)
    {
        $hookup = Hookup::where('slug',$hookup_slug)->first();
        $this->name = $hookup->name;
        $this->slug = $hookup->slug;
        $this->short_description = $hookup->short_description;
        $this->description = $hookup->description;
        $this->company = $hookup->company;
        $this->jobtitle = $hookup->jobtitle;
        $this->location = $hookup->location;
        $this->hookup_status = $hookup->hookup_status;
        $this->images = $hookup->images;
        $this->hookup_categories_id = $hookup->hookup_categories_id;
        $this->hookup_id = $hookup->id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updateHookup()
    {
        $hookup = Hookup::find($this->hookup_id);
        $hookup->name = $this->name;
        $hookup->slug = $this->slug;
        $hookup->short_description = $this->short_description;
        $hookup->description = $this->description;
        $hookup->company = $this->company;
        $hookup->jobtitle = $this->jobtitle;
        $hookup->location = $this->location;
        $hookup->hookup_status = $this->hookup_status;
        if($this->newimage)
        {
        $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
        $this->newimage->storeAs('hookups',$imageName);
        $hookup->images = $imageName;
        }
        $hookup->hookup_categories_id = $this->hookup_categories_id;
        $hookup->save();
        session()->flash('message','Hookup has been updated successfully!');
    }

    public function render()
    {
        $hookupcategories = HookupCategory::all();
        return view('livewire.admin.admin-edit-hookup-component',['hookupcategories'=>$hookupcategories])->layout('layouts.backend');
    }
}
