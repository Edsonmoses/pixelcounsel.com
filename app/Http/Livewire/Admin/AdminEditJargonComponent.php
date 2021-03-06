<?php

namespace App\Http\Livewire\Admin;

use App\Models\AlpFilters;
use App\Models\JargonCategory;
use App\Models\Jargons;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $placeObj = new Jargons();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $jargonsNameURL = strtolower($final_slug);

        $this->slug = Str::slug($jargonsNameURL);
         //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($jargonsNameURL)->exists();

        if($checkSlug){
            //Slug already exists.

            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;

            while(1){
                //Check if Slug with final prefix exists.
                
                $newSlug = $jargonsNameURL."-".$numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $jargonsNameURL;
        }
    }

    /*public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug'=>'required',
            'short_description' => 'required',
            'description' => 'required',
            'jargons_status' => 'required',
            'jargon_categories_id' => 'required',
            'afid' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }
    }*/

    public function updateJargon()
    {
       /* $this->validate([
            'name' => 'required',
            'slug'=>'required|unique:categories',
            'short_description' => 'required',
            'description' => 'required',
            'jargons_status' => 'required',
            'jargon_categories_id' => 'required',
            'afid' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }*/

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
