<?php

namespace App\Http\Livewire;

use App\Models\AlpFilters;
use App\Models\JargonCategory;
use App\Models\Jargons;
use Livewire\Component;
use Livewire\WithPagination;

class AtributesComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $atributes_name;
    public $searchTerm;
    public $postedby;

    public function mount($atributes_name)
    {
        $this->sorting = "default";
        $this->pagesize = 2000;
        $this->$atributes_name = $atributes_name;
    }
    public function render()
    {
        $atributes = AlpFilters::where('name',$this->atributes_name)->first();
        $atributes_id = $atributes->id;
        $atributes_name = $atributes->name;
        
        if($this->sorting =='date')
        {
            $jargons = Jargons::where('afid',$atributes_id)->orderBy('created_at','ASC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price')
        {
            $jargons = Jargons::where('afid',$atributes_id)->orderBy('name','ASC')->paginate($this->pagesize); 
        }
        elseif($this->sorting =='price-desc')
        {
            $jargons = Jargons::where('afid',$atributes_id)->orderBy('name','ASC')->paginate($this->pagesize); 
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
            $jargons = Jargons::where('afid',$atributes_id)->paginate($this->pagesize);
        }
        $jargoncategories = JargonCategory::all()->sortBy('name');
        $atributes = AlpFilters::all()->sortBy('name');
        return view('livewire.atributes-component',['jargons'=>$jargons, 'jargoncategories'=>$jargoncategories,'atributes_name'=>$atributes_name,'atributes'=>$atributes])->layout('layouts.baseapp');
    }
}
