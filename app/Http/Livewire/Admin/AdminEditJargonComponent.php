<?php

namespace App\Http\Livewire\Admin;

use App\Models\AlpFilters;
use App\Models\JargonCategory;
use App\Models\Jargons;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditJargonComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $jargons_status;
    public $images;
    public $jargon_categories_id;
    public $afid;
    public $newimage;
    public $jargon_id;

    public function mount($jargon_slug)
    {
        $jargon = Jargons::where('slug',$jargon_slug)->first();
        $this->name = $jargon->name;
        $this->slug = $jargon->slug;
        $this->short_description = $jargon->short_description;
        $this->description = $jargon->description;
        $this->jargons_status = $jargon->jargons_status;
        $this->images = $jargon->images;
        $this->jargon_categories_id = $jargon->jargon_categories_id;
        $this->afid = $jargon->afid;
        $this->jargon_id = $jargon->id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updateJargon()
    {
        $jargon = Jargons::find($this->jargon_id);
        $jargon->name = $this->name;
        $jargon->slug = $this->slug;
        $jargon->short_description = $this->short_description;
        $jargon->description = $this->description;
        $jargon->jargons_status = $this->jargons_status;
        if($this->newimage)
        {
        $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
        $this->newimage->storeAs('jargons',$imageName);
        $jargon->images = $imageName;
        }
        $jargon->jargon_categories_id = $this->jargon_categories_id;
        $jargon->afid = $this->afid;
        $jargon->save();
        session()->flash('message','Jargon has been updated successfully!');
    }

    public function render()
    {
        $jargoncategories = JargonCategory::all();
        $alpfilters = AlpFilters::all();
        return view('livewire.admin.admin-edit-jargon-component',['jargoncategories'=>$jargoncategories,'alpfilters'=>$alpfilters])->layout('layouts.backend');
    }
}
