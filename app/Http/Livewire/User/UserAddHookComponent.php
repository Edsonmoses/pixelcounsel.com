<?php

namespace App\Http\Livewire\User;

use App\Models\Hookup;
use App\Models\HookupCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class UserAddHookComponent extends Component
{use WithFileUploads;
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

    public $yes;

    public function mount()
    {
        $this->hookup_status = 'unpublished';
        $this->featured = '0';
        $this->postedby = Auth::user()->name;
        $this->phone = '254700000000';
        $this->web = 'example.com';
        $this->email = 'hookup@example.com';
        $this->jobUrl = 'example.com';
        
    }

    public function generateSlug()
    { 
        $placeObj = new Hookup;

         $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $hookupNameURL = strtolower($final_slug);

        $this->slug = Str::slug($hookupNameURL);
         //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($hookupNameURL)->exists();

        if($checkSlug){
            //Slug already exists.

            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;

            while(1){
                //Check if Slug with final prefix exists.
                
                $newSlug = $hookupNameURL."-".$numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
                $newSlug = Str::slug($newSlug); //String Slug


                $checkSlug = $placeObj->whereSlug($newSlug)->exists(); //Check if already exists in DB
                //This returns true if exists.

                if(!$checkSlug){

                    //There is not more coincidence. Finally found unique slug.
                    $this->slug = $newSlug; //New Slug 

                    break; //Break Loop
                
                }


            }

        }else{
            //Slug do not exists. Just use the selected Slug.
            $this->slug = $hookupNameURL;
        }
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
            'experience' => 'required',
            'price' => 'required',
            'schedule' => 'required',
            'fjob' => 'required',
            'phone' => 'digits:12',
            'email' => 'required|email',
            'open' => 'required',
        ]);
        if($this->price == '15,000 - 30,000')
        {
            $this->validateOnly($fields,[
                'price' => 'required',
            ]);
        }
        if($this->images)
        {
            $this->validateOnly($fields,[
                'images' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }
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
           'experience' => 'required',
           'price' => 'required',
           'schedule' => 'required',
           'fjob' => 'required',
           'phone' => 'digits:12',
           'email' => 'required|email',
           'open' => 'required',
        ]);
        if($this->price == '15,000 - 30,000')
        {
            $this->validate([
                'price' => 'required',
            ]);
        }
        if($this->images)
        {
            $this->validate([
                'images' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }
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
        session()->flash('message','Job has been submitted successfully!');
    }
    public function render()
    {
        $hookupcategories = HookupCategory::all()->sortBy('name');
        return view('livewire.user.user-add-hook-component',['hookupcategories'=>$hookupcategories])->layout('layouts.userbackend');
    }
}
