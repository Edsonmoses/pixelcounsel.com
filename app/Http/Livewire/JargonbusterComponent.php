<?php

namespace App\Http\Livewire;

use App\Models\AlpFilters;
use App\Models\JargonCategory;
use App\Models\Jargons;
use Livewire\Component;
use Livewire\WithPagination;

class JargonbusterComponent extends Component
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
            $jargons = Jargons::orderBy('created_at','ASC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price')
        {
            $jargons = Jargons::orderBy('name','ASC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price-desc')
        {
            $jargons = Jargons::orderBy('name','ASC')->paginate($this->pagesize); 
        }
        elseif($this->searchTerm)
        {
            $searchTerm = '%'.$this->searchTerm . '%';
            $jargons = Jargons::where('name','LIKE',$searchTerm)
                    ->orWhere('name','LIKE',$searchTerm)
                    ->orWhere('slug','LIKE',$searchTerm)
                    ->orWhere('description','LIKE',$searchTerm)
                    ->orderBy('id','ASC',$searchTerm)->paginate($this->pagesize);
        }
        else
        {
            $jargons = Jargons::paginate($this->pagesize);
        }
        $jargoncategories = JargonCategory::all();
        $atributes = AlpFilters::all();
        return view('livewire.jargonbuster-component',['jargons'=>$jargons, 'jargoncategories'=>$jargoncategories,'atributes'=>$atributes])->layout('layouts.baseapp');
    }
}
