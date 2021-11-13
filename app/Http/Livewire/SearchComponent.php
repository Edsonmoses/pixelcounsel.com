<?php

namespace App\Http\Livewire;

use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $designer;
    public $format;
    public $contributor;
    public $vector_status;
    public $images;
    public $vector_categories_id;

    public $sorting;
    public $pagesize;

    public $search;
    public $vector_cat;
    public $vector_cat_id;
    public $searchTerm;

    public function mount()
    {
        $this->vector_status = 'published';
        $this->contributor = '0';
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search','vector_cat','vector_cat_id'));
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
        $vector->vector_categories_id = $this->vector_categories_id;
        $vector->save();
        session()->flash('message','Vector file has been created successfully!');
    }
    public function search()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
            $vector = Vectorlogos::where('name','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('slug','LIKE',$searchTerm)
                    ->orWhere('description','LIKE',$searchTerm)
                    ->orWhere('designer','LIKE',$searchTerm)
                    ->orderBy('id','DESC',$searchTerm)->all();
    }
    public function render()
    {
        if($this->sorting =='date')
        {
            $vector = Vectorlogos::where('name','like','%')->where('vector_categories_id','like','%'.$this->vector_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price')
        {
            $vector = Vectorlogos::where('name','like','%')->where('vector_categories_id','like','%'.$this->vector_cat_id.'%')->orderBy('name','ASC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price-desc')
        {
            $vector = Vectorlogos::where('name','like','%')->where('vector_categories_id','like','%'.$this->vector_cat_id.'%')->orderBy('name','DESC')->paginate($this->pagesize); 
        }
        elseif($this->searchTerm)
        {
            $searchTerm = '%'.$this->searchTerm . '%';
            $vector = Vectorlogos::where('vector_categories_id','LIKE',$searchTerm)
                    ->orWhere('vector_categories_id','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('slug','LIKE',$searchTerm)
                    ->orWhere('description','LIKE',$searchTerm)
                    ->orWhere('designer','LIKE',$searchTerm)
                    ->orderBy('id','DESC',$searchTerm)->all();
        }
        else
        {
            $vector = Vectorlogos::where('name','like','%')->where('vector_categories_id','like','%'.$this->vector_cat_id.'%')->paginate($this->pagesize);
        }
        $vectorcategories = VectorCategory::all();
        return view('livewire.search-component',['vector'=>$vector, 'vectorcategories'=>$vectorcategories])->layout('layouts.baseapp');
    }
}
