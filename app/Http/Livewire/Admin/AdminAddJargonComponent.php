<?php

namespace App\Http\Livewire\Admin;

use App\Models\AlpFilters;
use App\Models\JargonCategory;
use App\Models\Jargons;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddJargonComponent extends Component
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

    public function mount()
    {
        $this->jargons_status = 'published';
        $this->afid = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug'=>'required|unique:categories',
            'short_description' => 'required',
            'description' => 'required',
            'jargons_status' => 'required',
            'jargon_categories_id' => 'required',
        ]);
    }

    public function addJargon()
    {
        $this->validate([
            'name' => 'required',
            'slug'=>'required|unique:categories',
            'short_description' => 'required',
            'description' => 'required',
            'jargons_status' => 'required',
            'jargon_categories_id' => 'required',
        ]);

        $jargon = new Jargons();
        $jargon->name = $this->name;
        $jargon->slug = $this->slug;
        $jargon->short_description = $this->short_description;
        $jargon->description = $this->description;
        $jargon->jargons_status = $this->jargons_status;
        $imageName = Carbon::now()->timestamp.'.'.$this->images->extension();
        $this->images->storeAs('jargons',$imageName);
        $jargon->images = $imageName;
        $jargon->jargon_categories_id = $this->jargon_categories_id;
        $jargon->afid = $this->afid;
        $jargon->save();
        session()->flash('message','Jargon has been created successfully!');
    }

    public function render()
    {
        $jargoncategories = JargonCategory::all();
        $alpfilters = AlpFilters::all();
        return view('livewire.admin.admin-add-jargon-component',['jargoncategories'=>$jargoncategories,'alpfilters'=>$alpfilters])->layout('layouts.backend');
    }
}
