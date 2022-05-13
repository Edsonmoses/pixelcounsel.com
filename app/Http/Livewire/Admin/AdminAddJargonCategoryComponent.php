<?php

namespace App\Http\Livewire\Admin;

use App\Models\JargonCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddJargonCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $postedby;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
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
            'slug'=>'required'
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug'=>'required'
        ]);
        $jargon = new JargonCategory();
        $jargon->name = $this->name;
        $jargon->slug = $this->slug;
        $jargon->postedby = $this->postedby;
        $jargon->save();
        session()->flash('message','Jargon Category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-jargon-category-component')->layout('layouts.backend');
    }
}
