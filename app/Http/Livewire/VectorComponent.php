<?php

namespace App\Http\Livewire;

use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class VectorComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $totalRecords;
    public $loadAmount = 24;

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

    public $vectors_status;

    public $searchTerm;

    public function loadMore()
    {
        $this->loadAmount += 12;
    }

    public function mount()
    {
        $this->totalRecords = Vectorlogos::count();
        $this->vector_status = 'unpublished';
    }
    public function searchTerm()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        $vectorlogos = Vectorlogos::where('name','LIKE',$searchTerm)
                ->orWhere('name','LIKE',$searchTerm)
                ->orWhere('slug','LIKE',$searchTerm)
                ->orWhere('description','LIKE',$searchTerm)
                ->orWhere('designer','LIKE',$searchTerm)
                ->orWhere('vtag','LIKE',$searchTerm)
                ->orderBy('name','ASC',$searchTerm)->paginate(12);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function addVector()
    {
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
        $vector->save();
        session()->flash('message','Logo has been submitted successfully!');
    }
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        $vectorlogos = Vectorlogos::where('name','LIKE',$searchTerm)
                ->orWhere('name','LIKE',$searchTerm)
                ->orWhere('slug','LIKE',$searchTerm)
                ->orWhere('description','LIKE',$searchTerm)
                ->orWhere('designer','LIKE',$searchTerm)
                ->orWhere('vtag','LIKE',$searchTerm)
                ->orderBy('created_at','DESC')->paginate(15,['*'],'vectors');

        //$vectorlogos = Vectorlogos::where('vector_status',$this->vectors_status)->orderBy('name', 'ASC')
        //->limit($this->loadAmount)
        //->get();
        $vectorcategories = VectorCategory::all();
        return view('livewire.vector-component',['vectorlogos'=>$vectorlogos,'vectorcategories'=>$vectorcategories])->layout('layouts.baseapp');
    }
}
