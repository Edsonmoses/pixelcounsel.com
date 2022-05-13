<?php

namespace App\Http\Livewire\User;

use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class UserEditVectorComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $designer;
    public $format;
    public $contributor;
    public $vector_status;
    public $images;
    public $image;
    public $vector_categories_id;
    public $newimage;
    public $newimages;
    public $vector_id;
    public $postedby;
    public $vtag;

    public function mount($vector_slug)
    {
        $vecor = Vectorlogos::where('slug',$vector_slug)->first();
        $this->name = $vecor->name;
        $this->slug = $vecor->slug;
        $this->short_description = $vecor->short_description;
        $this->description = $vecor->description;
        $this->designer = $vecor->designer;
        $this->format = $vecor->format;
        $this->contributor = $vecor->contributor;
        $this->vector_status = $vecor->vector_status;
        $this->images = $vecor->images;
        $this->image = $vecor->image;
        $this->vector_categories_id = $vecor->vector_categories_id;
        $this->vector_id = $vecor->id;
        $this->postedby = Auth::user()->name;
        $this->vtag = str_replace("\n",',',trim($vecor->vtag));
    }

    public function generateSlug()
    {
        $placeObj = new Vectorlogos();
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $vectorNameURL = strtolower($final_slug);
        
        $this->slug =  Str::slug($vectorNameURL);
         //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($vectorNameURL)->exists();

        if($checkSlug){
            //Slug already exists.

            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;

            while(1){
                //Check if Slug with final prefix exists.
                
                $newSlug = $vectorNameURL."-".$numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $vectorNameURL;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'designer' => 'required',
            'format' => 'required',
            'vector_categories_id' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:ai,eps,pdf,svg,CDR',
            ]);
        }

        if($this->newimages)
        {
            $this->validateOnly($fields,[
                'newimages' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }
    }

    public function updateVector()
    {
        $this->validate([
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'format' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'vector_categories_id' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:ai,eps,pdf,svg,CDR',
            ]);
        }

        if($this->newimages)
        {
            $this->validate([
                'newimages' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }
        $vector = Vectorlogos::find($this->vector_id);
        $vector->name = $this->name;
        $vector->slug = $this->slug;
        $vector->short_description = $this->short_description;
        $vector->description = $this->description;
        $vector->designer = $this->designer;
        $vector->format = $this->format;
        $vector->contributor = $this->contributor;
        $vector->vector_status = $this->vector_status;
        if($this->newimage)
        {
        $imageName = Carbon::now()->timestamp.'.'.$this->newimage->getClientOriginalExtension();
        $this->newimage->storeAs('vectors',$imageName);
        $vector->images = $imageName;
        }
        if($this->newimages)
        {
        $imageName = Carbon::now()->timestamp.'.'.$this->newimages->getClientOriginalExtension();
        $this->newimages->storeAs('vectors',$imageName);
        $vector->image = $imageName;
        }
        $vector->vector_categories_id = $this->vector_categories_id;
        $vector->postedby = $this->postedby;
        $vector->vtag = str_replace("\n",',',trim($this->vtag));
        $vector->save();
        session()->flash('message','Vector file has been updated successfully!');
    }
    public function render()
    {
        $vectorcategories = VectorCategory::all()->sortBy('name');
        return view('livewire.user.user-edit-vector-component',['vectorcategories'=>$vectorcategories])->layout('layouts.userbackend');
    }
}
