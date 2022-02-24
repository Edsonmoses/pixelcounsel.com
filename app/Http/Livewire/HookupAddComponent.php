<?php

namespace App\Http\Livewire;

use App\Models\Hookup;
use App\Models\HookupCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class HookupAddComponent extends Component
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
    public $experience;
    public $price;
    public $schedule;
    public $fjob;
    public $featured;
    public $phone;
    public $email;
    public $web;
    public $jobUrl;
    public $open;
    public $postedby;

    public function mount()
    {
        $this->hookup_status = 'unpublished';
        $this->featured = '0';
        $this->postedby = Auth::user()->name;
        $this->phone = '254 700 000 000';
        $this->web = 'example.com';
        $this->email = 'hookup@example.com';
        $this->jobUrl = 'example.com';
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'company' => 'required',
            'jobtitle' => 'required',
            'location' => 'required',
            'hookup_status' => 'required',
            'images' => 'required|mimes:png,jpg,jpeg',
            'hookup_categories_id' => 'required',
            'experience' => 'required',
            'price' => 'required',
            'schedule' => 'required',
            'fjob' => 'required',
            'featured' => 'required',
            'phone' => 'required|digits:12',
            'email' => 'required|email',
            'web' => 'required',
            'jobUrl' => 'required',
            'open' => 'required',
            'postedby' => 'required',
        ]);
    }

    public function jobStored()
    {
        $this->validate([
           'name' => 'required',
           'slug' => 'required',
           'short_description' => 'required',
           'description' => 'required',
           'company' => 'required',
           'jobtitle' => 'required',
           'location' => 'required',
           'hookup_status' => 'required',
           'images' => 'required|mimes:png,jpg,jpeg',
           'hookup_categories_id' => 'required',
           'experience' => 'required',
           'price' => 'required',
           'schedule' => 'required',
           'fjob' => 'required',
           'featured' => 'required',
           'phone' => 'required|digits:12',
           'email' => 'required|email',
           'web' => 'required',
           'jobUrl' => 'required',
           'open' => 'required',
           'postedby' => 'required',
        ]);
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
        $hookup->experience = $this->experience;
        $hookup->price = $this->price;
        $hookup->schedule = $this->schedule;
        $hookup->fjob = $this->fjob;
        $hookup->featured = $this->featured;
        $hookup->phone = $this->phone;
        $hookup->email = $this->email;
        $hookup->web = $this->web;
        $hookup->jobUrl = $this->jobUrl;
        $hookup->open = $this->open;
        $hookup->postedby = $this->postedby;
        $hookup->save();
        session()->flash('message','Hookup has been created successfully!');
    }
    public function render()
    {
        $hookupcategories = HookupCategory::all();
        return view('livewire.hookup-add-component',['hookupcategories'=>$hookupcategories])->layout('layouts.baseapp');
    }
}
