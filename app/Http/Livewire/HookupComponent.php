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
        $searchTerm = '%'.$this->searchTerm . '%';
        $hookups = Hookup::where('name','LIKE',$searchTerm)
                ->orWhere('name','LIKE',$searchTerm)
                ->orWhere('company','LIKE',$searchTerm)
                ->orWhere('jobtitle','LIKE',$searchTerm)
                ->orWhere('location','LIKE',$searchTerm)
                ->latest('updated_at','ASC',$searchTerm)->latest()->where('hookup_status','published')->paginate(10);
      
        $hookupcategories = HookupCategory::all()->sortBy('name');
        return view('livewire.hookup-component',['hookups'=>$hookups,'hookupcategories'=>$hookupcategories])->layout('layouts.baseapp');
    }
}
