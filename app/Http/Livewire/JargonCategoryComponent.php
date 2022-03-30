<?php

namespace App\Http\Livewire;

use App\Models\AlpFilters;
use App\Models\JargonCategory;
use App\Models\Jargons;
use Livewire\Component;
use Livewire\WithPagination;

class JargonCategoryComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $category_slug;
    public $atributes_name;
    public $searchTerm;

    public function mount($category_slug,$atributes_name=null)
    {
        $this->sorting = "default";
        $this->pagesize = 2000;
        $this->$category_slug = $category_slug;
        $this->$atributes_name = $atributes_name;
    }
    public function render()
    {
        $category_id = null;
        $category_name = "";
        $filter = "";
        if($this->category_slug)
        {
            $atributes = AlpFilters::where('name',$this->atributes_name)->first();
            $category_id = $atributes->id;
            $category_name = $atributes->name;
            $filter = "sub";
        }else{
            $category = JargonCategory::where('slug',$this->category_slug)->first();
            $category_id = $category->id;
            $category_name = $category->name;
            $filter = "";
        }

        if($this->sorting =='date')
        {
            $jargons = Jargons::where($filter.'jargon_categories_id',$category_id)->orderBy('created_at','ASC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price')
        {
            $jargons = Jargons::where($filter.'jargon_categories_id',$category_id)->orderBy('name','ASC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price-desc')
        {
            $jargons = Jargons::where($filter.'jargon_categories_id',$category_id)->orderBy('name','ASC')->paginate($this->pagesize); 
        }
        elseif($this->searchTerm)
        {
            $searchTerm = '%'.$this->searchTerm . '%';
            $jargons = Jargons::where('name','LIKE',$searchTerm)
                ->orWhere('name','LIKE',$searchTerm)
                ->orWhere('slug','LIKE',$searchTerm)
                ->orWhere('short_description','LIKE',$searchTerm)
                ->orWhere('description','LIKE',$searchTerm)
                ->orderBy('name','ASC',$searchTerm)->paginate($this->pagesize);
        }
        else
        {
            $jargons = Jargons::where('jargon_categories_id',$category_id)->paginate($this->pagesize);
            $af_jargons = Jargons::where('afid',1)->where('jargon_categories_id',$category_id)->paginate($this->pagesize); 
        }
        $jargoncategories = JargonCategory::all()->sortBy('name');
        $atributes = AlpFilters::all()->sortBy('name');
        return view('livewire.jargon-category-component',['jargons'=>$jargons, 'jargoncategories'=>$jargoncategories,'category_name'=>$category_name,'atributes'=>$atributes,'af_jargons'=>$af_jargons])->layout('layouts.baseapp');
    }
}
