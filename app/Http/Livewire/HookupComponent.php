<?php

namespace App\Http\Livewire;

use App\Models\Hookup;
use App\Models\HookupCategory;
use Livewire\Component;
use Livewire\WithPagination;

class HookupComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $searchTerm;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }

    public function render()
    {
        if($this->sorting =='date')
        {
            $hookups = Hookup::orderBy('created_at','DESC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price')
        {
            $hookups = Hookup::orderBy('name','DESC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price-desc')
        {
            $hookups = Hookup::orderBy('name','DESC')->paginate($this->pagesize); 
        }
        elseif($this->searchTerm)
        {
            $searchTerm = '%'.$this->searchTerm . '%';
            $hookups = Hookup::where('name','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('company','LIKE',$searchTerm)
                    ->orWhere('jobtitle','LIKE',$searchTerm)
                    ->orWhere('location','LIKE',$searchTerm)
                    ->orderBy('id','DESC',$searchTerm)->paginate($this->pagesize);
            $f_hookups = Hookup::where('name','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('company','LIKE',$searchTerm)
                    ->orWhere('jobtitle','LIKE',$searchTerm)
                    ->orWhere('location','LIKE',$searchTerm)
                    ->orderBy('id','DESC',$searchTerm)->paginate($this->pagesize);
            $pt_hookups = Hookup::where('name','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('company','LIKE',$searchTerm)
                    ->orWhere('jobtitle','LIKE',$searchTerm)
                    ->orWhere('location','LIKE',$searchTerm)
                    ->orderBy('id','DESC',$searchTerm)->paginate($this->pagesize);
            $ft_hookups = Hookup::where('name','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('company','LIKE',$searchTerm)
                    ->orWhere('jobtitle','LIKE',$searchTerm)
                    ->orWhere('location','LIKE',$searchTerm)
                    ->orderBy('id','DESC',$searchTerm)->paginate($this->pagesize);
        }
        else
        {
            $hookups = Hookup::latest()->paginate($this->pagesize);
            $f_hookups = Hookup::where('featured',1)->inRandomOrder()->take($this->pagesize)->get();
            $pt_hookups = Hookup::whereIn('fjob',['Part Time'])->inRandomOrder()->get();
            $ft_hookups = Hookup::whereIn('fjob',['Full Time'])->inRandomOrder()->get();
        }
        $hookupcategories = HookupCategory::all();
        return view('livewire.hookup-component',['hookups'=>$hookups,'hookupcategories'=>$hookupcategories,'f_hookups'=>$f_hookups,'pt_hookups'=>$pt_hookups,'ft_hookups'=>$ft_hookups])->layout('layouts.baseapp');
    }
}
