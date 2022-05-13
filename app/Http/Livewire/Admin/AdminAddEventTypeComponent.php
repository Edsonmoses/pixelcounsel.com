<?php

namespace App\Http\Livewire\Admin;

use App\Models\EventType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddEventTypeComponent extends Component
{
    public $name;
    public $slug;

    public function mount()
    {
        $this->events_status = 'unpublished';
    }

    public function generateslug()
    {
        $placeObj = new EventType();

        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $this->name); //Removed all Special Character and replace with hyphen
        $final_slug = preg_replace('/-+/', '-', $string); //Removed double hyphen
        $eventTypeNameURL = strtolower($final_slug);

        $this->slug = Str::slug($eventTypeNameURL);
         //Check if this Slug already exists 
        $checkSlug = $placeObj->whereSlug($eventTypeNameURL)->exists();

        if($checkSlug){
            //Slug already exists.

            //Add numerical prefix at the end. Starting with 1
            $numericalPrefix = 1;

            while(1){
                //Check if Slug with final prefix exists.
                
                $newSlug = $eventTypeNameURL."-".$numericalPrefix++; //new Slug with incremented Slug Numerical Prefix
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
            $this->slug = $eventTypeNameURL;
        }
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug'=>'required'
        ]);
    }

    public function storeType()
    {
        $this->validate([
            'name' => 'required',
            'slug'=>'required'
        ]);
        $etype = new EventType();
        $etype->name = $this->name;
        $etype->slug = $this->slug;
        $etype->save();
        session()->flash('message','Event Type has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-event-type-component')->layout('layouts.backend');
    }
}
