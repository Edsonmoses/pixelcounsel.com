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
    public $searchTerm;

    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 2000;
        $this->$category_slug = $category_slug;
    }
    public function render()
    {
        $category = JargonCategory::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if($this->sorting =='date')
        {
            $jargons = Jargons::where('jargon_categories_id',$category_id)->orderBy('created_at','ASC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price')
        {
            $jargons = Jargons::where('jargon_categories_id',$category_id)->orderBy('name','ASC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price-desc')
        {
            $jargons = Jargons::where('jargon_categories_id',$category_id)->orderBy('name','ASC')->paginate($this->pagesize); 
        }
        elseif($this->searchTerm)
        {
            $searchTerm = '%'.$this->searchTerm . '%';
            $jargons = Jargons::where('hookup_categories_id','LIKE',$category_id,$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('slug','LIKE',$searchTerm)
                    ->orWhere('description','LIKE',$searchTerm)
                    ->orderBy('id','ASC',$searchTerm)->all($this->pagesize);
        }
        else
        {
            $jargons = Jargons::where('jargon_categories_id',$category_id)->paginate($this->pagesize);
        }
        $jargoncategories = JargonCategory::all();
        $atributes = AlpFilters::all();
        return view('livewire.jargon-category-component',['jargons'=>$jargons, 'jargoncategories'=>$jargoncategories,'category_name'=>$category_name,'atributes'=>$atributes])->layout('layouts.baseapp');
    }
}
