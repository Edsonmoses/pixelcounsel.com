<?php

namespace App\Http\Livewire;

use App\Models\Events;
use App\Models\Hookup;
use App\Models\Jargons;
use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;

    public $search;
    public $vector_cat;
    public $vector_cat_id;
    public $searchTerm;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search','vector_cat','vector_cat_id'));
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
            $vector = Vectorlogos::where('name','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('slug','LIKE',$searchTerm)
                    ->orWhere('description','LIKE',$searchTerm)
                    ->orWhere('designer','LIKE',$searchTerm)
                    ->orderBy('id','DESC',$searchTerm)->paginate($this->pagesize);
        }
        else
        {
            $vector = Vectorlogos::where('name','like','%')->where('vector_categories_id','like','%'.$this->vector_cat_id.'%')->paginate($this->pagesize);
        }
        $vectorcategories = VectorCategory::all();
        $hookup = Hookup::orderBy('name','ASC')->latest('updated_at')->first();
        $jargon = Jargons::orderBy('name','ASC')->latest('updated_at')->first();
        $event = Events::orderBy('name','ASC')->latest('updated_at')->first();
        return view('livewire.home-component',['vector'=>$vector, 'vectorcategories'=>$vectorcategories,'hookup'=>$hookup,'jargon'=>$jargon,'event'=>$event])->layout('layouts.base');
    }
}
