<?php

namespace App\Http\Livewire\Admin;

use App\Models\JargonCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditJargonCategoryComponent extends Component
{
    public $jargon_slug;
    public $jargon_id;
    public $name;
    public $slug;

    public function mount($jargon_slug)
    {
        $this->jargon_slug = $jargon_slug;
        $jargon = JargonCategory::where('slug',$jargon_slug)->first();
        $this->jargon_id = $jargon->id;
        $this->name = $jargon->name;
        $this->slug = $jargon->slug;
    }

    public function generateslug()
    {
        $placeObj = new JargonCategory();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $j_categoryNameURL = strtolower($final_slug);

        $this->slug = Str::slug($j_categoryNameURL);
         //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($j_categoryNameURL)->exists();

        if($checkSlug){
            //Slug already exists.

            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;

            while(1){
                //Check if Slug with final prefix exists.
                
                $newSlug = $j_categoryNameURL."-".$numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $j_categoryNameURL;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug'=>'required|unique:categories'
        ]);
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug'=>'required|unique:categories'
        ]);
        $jargon = JargonCategory::find($this->jargon_id);
        $jargon->name = $this->name;
        $jargon->slug = $this->slug;
        $jargon->save();
        session()->flash('message','Jargon Category has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-jargon-category-component')->layout('layouts.backend');
    }
}
