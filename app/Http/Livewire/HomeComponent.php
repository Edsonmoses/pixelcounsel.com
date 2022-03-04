<?php

namespace App\Http\Livewire;

use App\Models\Ads;
use App\Models\Events;
use App\Models\Hookup;
use App\Models\Jargons;
use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use Carbon\Carbon;
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
    }
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        $vector = Vectorlogos::where('name','LIKE',$searchTerm)
                ->orWhere('name','LIKE',$searchTerm)
                ->orWhere('slug','LIKE',$searchTerm)
                ->orWhere('description','LIKE',$searchTerm)
                ->orWhere('designer','LIKE',$searchTerm)
                ->orderBy('id','DESC',$searchTerm)->paginate(12);

        $vectorcategories = VectorCategory::all();
        $hookup = Hookup::whereDate('open','>=',Carbon::now())->where('hookup_status','published')->get()->count();
        $jargon = Jargons::orderBy('name','ASC')->where('jargons_status','published')->first();
        $event = Events::whereDate('enddate','>=',Carbon::now())->where('events_status','published')->get()->count();
        $tophomeAds = Ads::where('position',5)->where('endate','>=',Carbon::today())->where('status',1)->get();
        return view('livewire.home-component',['vector'=>$vector, 'vectorcategories'=>$vectorcategories,'hookup'=>$hookup,'jargon'=>$jargon,'event'=>$event,'tophomeAds'=>$tophomeAds])->layout('layouts.base');
    }
}
