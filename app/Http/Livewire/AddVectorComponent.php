<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use App\Notifications\TaskCompleted;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddVectorComponent extends Component
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
    public $postedby;
    public $downloads;
    public $vtag;
//use with account status
    public $totalRecords;
    public $loadAmount = 24;
    public $searchTerm;

    public function loadMore()
    {
        $this->loadAmount += 12;
    }

    public function mount()
    {
        if(Auth::check())
        {
        $this->vector_status = 'unpublished';
        $this->contributor = Auth::user()->name;
        $this->designer = 'Unknown';
        $this->postedby = Auth::user()->name;
        $this->downloads = 0;
        //use with account status
        $this->confirm_status_at = 1;
        }
        else
        {
            return redirect('/vector')->with('success', 'Login to post a logo!');
        }
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
            'slug' => 'required|unique:vectorlogos',
            'short_description' => 'required',
            'description' => 'required',
            'designer' => 'required',
            'format' => 'required',
            'vector_status' => 'required',
            'vector_categories_id' => 'required',
        ]);
        if($this->images)
        {
            $this->validateOnly($fields,[
                'images' => 'required|mimes:ai,eps,pdf,svg,CDR',
            ]);
        }

        if($this->image)
        {
            $this->validateOnly($fields,[
                'image' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }
    }

    public function addVector()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:vectorlogos',
            'short_description' => 'required',
            'description' => 'required',
            'designer' => 'required',
            'format' => 'required',
            'vector_status' => 'required',
            'images' => 'required|mimes:ai,eps,pdf,svg,CDR',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'vector_categories_id' => 'required',
        ]);
        if($this->images)
        {
            $this->validate([
                'images' => 'required|mimes:ai,eps,pdf,svg,CDR',
            ]);
        }

        if($this->image)
        {
            $this->validate([
                'image' => 'required|mimes:png,jpg,jpeg,webp',
            ]);
        }

        $users = Auth::user()->name;
        $vector = new Vectorlogos();
        $vector->name = $this->name;
        $vector->slug = $this->slug;
        $vector->short_description = $this->short_description;
        $vector->description = $this->description;
        $vector->designer = $this->designer;
        $vector->format = $this->format;
        $vector->contributor = $this->contributor;
        $vector->vector_status = $this->vector_status;
        $imageName = Carbon::now()->timestamp.'.'.$this->images->extension();
        $this->images->storeAs('vectors',$imageName);
        $vector->images = $imageName;
        $imgName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('vectors',$imgName);
        $vector->image = $imgName;
        $vector->vector_categories_id = $this->vector_categories_id;
        $vector->postedby = $this->postedby;
        $vector->downloads = $this->downloads;
        $vector->vtag = str_replace("\n",',',trim($this->vtag));
        $vector->save();
        Notification::send($users, new TaskCompleted($this->name));
        //session()->flash('message','Logo has been submitted successfully!');
        return redirect('/add-vectors/add');
    }

    public function updateConfirmation()
    {
        $user = User::find(Auth::user()->id);
        $user->confirm_status_at = $this->confirm_status_at;
        $user->save();
        return redirect('/vector');
    }

    public function render()
    {
        if (is_null(Auth::user()->confirm_status_at)){
            $searchTerm = '%'.$this->searchTerm . '%';
        $vectorlogos = Vectorlogos::where('name','LIKE',$searchTerm)
                ->orWhere('name','LIKE',$searchTerm)
                ->orWhere('slug','LIKE',$searchTerm)
                ->orWhere('description','LIKE',$searchTerm)
                ->orWhere('designer','LIKE',$searchTerm)
                ->orWhere('vtag','LIKE',$searchTerm)
                ->orderBy('updated_at','ASC',$searchTerm)->paginate(15);

        $vectorcategories = VectorCategory::all();
        return view('livewire.user.account-status-component',['vectorlogos'=>$vectorlogos,'vectorcategories'=>$vectorcategories])->layout('layouts.baseapp');
        }else{
        $vectorcategories = VectorCategory::all();
        return view('livewire.add-vector-component',['vectorcategories'=>$vectorcategories])->layout('layouts.baseapp');
        }
    }
}
