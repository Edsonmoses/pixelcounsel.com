<?php

namespace App\Http\Livewire\User;

use App\Models\Hookup;
use App\Models\HookupCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class UsereditHookupComponent extends Component
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
    public $experience;
    public $price;
    public $schedule;
    public $fjob;
    public $featured;
    public $phone;
    public $email;
    public $web;
    public $postedby;
    public $open;

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
        $this->experience = $hookup->experience;
        $this->price = $hookup->price;
        $this->schedule = $hookup->schedule;
        $this->fjob = $hookup->fjob;
        $this->featured = $hookup->featured;
        $this->phone = $hookup->phone;
        $this->email = $hookup->email;
        $this->web = $hookup->web;
        $this->open = $hookup->open;
        $this->postedby = Auth::user()->name;
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
            'short_description' => 'required',
            'description' => 'required',
            'company' => 'required',
            'jobtitle' => 'required',
            'location' => 'required',
            'experience' => 'required',
            'schedule' => 'required',
            'open' => 'required',
        ]);
        if($this->price == '15,000 - 30,000')
        {
            $this->validateOnly($fields,[
                'price' => 'required',
            ]);
        }
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }
    }

    public function updateHookup()
    {
        $this->validate([
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'company' => 'required',
            'jobtitle' => 'required',
            'location' => 'required',
            'experience' => 'required',
            'price' => 'required',
            'schedule' => 'required',
            'open' => 'required',
        ]);
        if($this->price == '15,000 - 30,000')
        {
            $this->validate([
                'price' => 'required',
            ]);
        }
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }
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
        $hookup->experience = $this->experience;
        $hookup->price = $this->price;
        $hookup->schedule = $this->schedule;
        $hookup->fjob = $this->fjob;
        $hookup->featured = $this->featured;
        $hookup->phone = $this->phone;
        $hookup->email = $this->email;
        $hookup->web = $this->web;
        $hookup->postedby = $this->postedby;
        $hookup->open = $this->open;
        $hookup->save();
        session()->flash('message','Hookup has been updated successfully!');
    }
    public function render()
    {
        $hookupcategories = HookupCategory::all()->sortBy('name');
        return view('livewire.user.useredit-hookup-component',['hookupcategories'=>$hookupcategories])->layout('layouts.userbackend');
    }
}
