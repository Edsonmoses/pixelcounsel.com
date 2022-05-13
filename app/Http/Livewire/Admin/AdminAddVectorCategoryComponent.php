<?php

namespace App\Http\Livewire\Admin;

use App\Models\VectorCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddVectorCategoryComponent extends Component
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
            'slug'=>'required'
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug'=>'required'
        ]);
        $vector = new VectorCategory();
        $vector->name = $this->name;
        $vector->slug = $this->slug;
        $vector->postedby = $this->postedby;
        $vector->save();
        session()->flash('message','Vector Category has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-vector-category-component')->layout('layouts.backend');
    }
}
