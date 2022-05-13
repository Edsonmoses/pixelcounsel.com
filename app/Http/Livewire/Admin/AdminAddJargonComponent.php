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
    public $postedby;

    public function mount()
    {
        $this->jargons_status = 'unpublished';
        $this->postedby = Auth::user()->name;
        $this->afid = 0;
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

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug'=>'required',
            'short_description' => 'required',
            'description' => 'required',
            'jargons_status' => 'required',
            'jargon_categories_id' => 'required',
            'images' => 'required|mimes:png,jpg,jpeg,webp',
            'afid' => 'required',
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
            'images' => 'required|mimes:png,jpg,jpeg,webp',
            'afid' => 'required',
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
        $jargon->postedby = $this->postedby;
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
