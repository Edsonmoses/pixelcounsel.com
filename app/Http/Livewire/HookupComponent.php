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
            $hookups = Hookup::orderBy('name','ASC')->paginate($this->pagesize); 
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
        }
        else
        {
            $hookups = Hookup::paginate($this->pagesize);
        }
        $hookupcategories = HookupCategory::all();
        return view('livewire.hookup-component',['hookups'=>$hookups,'hookupcategories'=>$hookupcategories])->layout('layouts.baseapp');
    }
}