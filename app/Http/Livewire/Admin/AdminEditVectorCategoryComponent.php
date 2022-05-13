<?php

namespace App\Http\Livewire\Admin;

use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditVectorCategoryComponent extends Component
{
    public $vector_slug;
    public $vectorcategory_id;
    public $name;
    public $slug;

    public function mount($vector_slug)
    {
        $this->vector_slug = $vector_slug;
        $vectorcategory = VectorCategory::where('slug',$vector_slug)->first();
        $this->vectorcategory_id = $vectorcategory->id;
        $this->name = $vectorcategory->name;
        $this->slug = $vectorcategory->slug;
    }

    public function generateslug()
    {
        $placeObj = new VectorCategory();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $v_categoryNameURL = strtolower($final_slug);

        $this->slug = Str::slug($v_categoryNameURL);
         //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($v_categoryNameURL)->exists();

        if($checkSlug){
            //Slug already exists.

            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;

            while(1){
                //Check if Slug with final prefix exists.
                
                $newSlug = $v_categoryNameURL."-".$numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $v_categoryNameURL;
        }
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug'=>'required|unique:categories'
        ]);
    }

    public function updateVector()
    {
        $this->validate([
            'name' => 'required',
            'slug'=>'required|unique:categories'
        ]);
        
        $vectorcategory = VectorCategory::find($this->vectorcategory_id);
        $vectorcategory->name = $this->name;
        $vectorcategory->slug = $this->slug;
        $vectorcategory->save();
        session()->flash('message','Vector Category has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-vector-category-component')->layout('layouts.backend');
    }
}
