<?php

namespace App\Http\Livewire;

use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use Carbon\Carbon;
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

    public function mount()
    {
        $this->vector_status = 'unpublished';
        $this->contributor = Auth::user()->name;
        $this->postedby = Auth::user()->name;
        $this->downloads = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
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
            'images' => 'required|mimes:png,jpg,jpeg,ai,eps,pdf',
            'image' => 'required|mimes:png,jpg,jpeg',
            'vector_categories_id' => 'required',
        ]);
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
            'images' => 'required|mimes:png,jpg,jpeg,ai,eps,pdf',
            'image' => 'required|mimes:png,jpg,jpeg',
            'vector_categories_id' => 'required',
        ]);

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
        $vector->save();
        session()->flash('message','Logo has been submites successfully!');
        return redirect()->back();
    }

    public function render()
    {
        $vectorcategories = VectorCategory::all();
        return view('livewire.add-vector-component',['vectorcategories'=>$vectorcategories])->layout('layouts.baseapp');
    }
}
