<?php

namespace App\Http\Livewire\Admin;

use App\Models\EventsCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditEventCategoryComponent extends Component
{
    public $event_slug;
    public $event_id;
    public $name;
    public $slug;

    public function mount($event_slug)
    {
        $this->event_slug = $event_slug;
        $event = EventsCategory::where('slug',$event_slug)->first();
        $this->event_id = $event->id;
        $this->name = $event->name;
        $this->slug = $event->slug;
    }

    public function generateslug()
    {
        $placeObj = new EventsCategory();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $e_categoryNameURL = strtolower($final_slug);

        $this->slug = Str::slug($e_categoryNameURL);
         //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($e_categoryNameURL)->exists();

        if($checkSlug){
            //Slug already exists.

            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;

            while(1){
                //Check if Slug with final prefix exists.
                
                $newSlug = $e_categoryNameURL."-".$numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $e_categoryNameURL;
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
        $event = EventsCategory::find($this->event_id);
        $event->name = $this->name;
        $event->slug = $this->slug;
        $event->postedby = $this->postedby;
        $event->save();
        session()->flash('message','Event Category has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-event-category-component')->layout('layouts.backend');
    }
}
