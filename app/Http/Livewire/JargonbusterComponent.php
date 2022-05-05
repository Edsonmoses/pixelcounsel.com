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
            $searchTerm = '%'.$this->searchTerm . '%';
            $jargons = Jargons::where('name','LIKE',$searchTerm)
                ->orWhere('name','LIKE',$searchTerm)
                ->orWhere('slug','LIKE',$searchTerm)
                ->orWhere('short_description','LIKE',$searchTerm)
                ->orWhere('description','LIKE',$searchTerm)
                ->orderBy('name','ASC',$searchTerm)->get();
        $jargons = Jargons::all()->sortBy('name');
        $af_jargons = Jargons::where('afid',1)->paginate(12,['*'],'jargons'); 
        $jargoncategories = JargonCategory::all()->sortBy('name');
        $atributes = AlpFilters::where('category_id',1)->orderBy('name','ASC')->paginate(26,['*'],'atributes');
        return view('livewire.jargonbuster-component',['jargons'=>$jargons, 'jargoncategories'=>$jargoncategories,'atributes'=>$atributes,'af_jargons'=>$af_jargons])->layout('layouts.baseapp');
    }
}
