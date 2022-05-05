<?php

namespace App\Http\Livewire;

use App\Models\Hookup;
use App\Models\HookupCategory;
use Livewire\Component;
use Livewire\WithPagination;

class HookupCategoryComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $category_slug;
    public $searchTerm;

    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->$category_slug = $category_slug;
    }
    public function render()
    {
        $category = HookupCategory::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if($this->sorting =='date')
        {
            $hookups = Hookup::where('hookup_categories_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price')
        {
            $hookups = Hookup::where('hookup_categories_id',$category_id)->orderBy('name','ASC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price-desc')
        {
            $hookups = Hookup::where('hookup_categories_id',$category_id)->orderBy('name','DESC')->paginate($this->pagesize); 
        }
        elseif($this->searchTerm)
        {
            $searchTerm = '%'.$this->searchTerm . '%';
            $hookups = Hookup::where('jobtitle','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('company','LIKE',$searchTerm)
                    ->orWhere('jobtitle','LIKE',$searchTerm)
                    ->orWhere('location','LIKE',$searchTerm)
                    ->orderBy('id','DESC',$searchTerm)->paginate($this->pagesize,['*'],'hookups');
            $f_hookups = Hookup::where('name','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('company','LIKE',$searchTerm)
                    ->orWhere('jobtitle','LIKE',$searchTerm)
                    ->orWhere('location','LIKE',$searchTerm)
                    ->orderBy('id','DESC',$searchTerm)->paginate($this->pagesize,['*'],'f_hookups');
            $pt_hookups = Hookup::where('name','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('company','LIKE',$searchTerm)
                    ->orWhere('jobtitle','LIKE',$searchTerm)
                    ->orWhere('location','LIKE',$searchTerm)
                    ->orderBy('id','DESC',$searchTerm)->paginate($this->pagesize,['*'],'pt_hookups');
            $ft_hookups = Hookup::where('name','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('company','LIKE',$searchTerm)
                    ->orWhere('jobtitle','LIKE',$searchTerm)
                    ->orWhere('location','LIKE',$searchTerm)
                    ->orderBy('id','DESC',$searchTerm)->paginate($this->pagesize,['*'],'ft_hookups');
        }
        else
        {
            $hookups = Hookup::where('hookup_categories_id',$category_id)->paginate($this->pagesize,['*'],'hookups');
            $f_hookups = Hookup::where('featured',1)->inRandomOrder()->take($this->pagesize)->get();
            $pt_hookups = Hookup::whereIn('fjob',['Part Time'])->inRandomOrder()->get();
            $ft_hookups = Hookup::whereIn('fjob',['Full Time'])->inRandomOrder()->get();
        }
        $hookupcategories = HookupCategory::all()->sortBy('name');
        return view('livewire.hookup-category-component',['hookups'=>$hookups,'hookupcategories'=>$hookupcategories,'category_name'=>$category_name,'f_hookups'=>$f_hookups,'pt_hookups'=>$pt_hookups,'ft_hookups'=>$ft_hookups])->layout('layouts.baseapp');
    }
}
