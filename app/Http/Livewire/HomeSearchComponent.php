<?php

namespace App\Http\Livewire;

use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use Livewire\Component;

class HomeSearchComponent extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $vectorcategories = VectorCategory::all();
        return view('livewire.home-search-component', [

            'vector' => Vectorlogos::where('name', 'like', '%'.$this->search.'%')->get(),

        'vectorcategories'=> VectorCategory::where('name', 'like', '%'.$this->search.'%')->get(),])->layout('layouts.baseapp');
    }
}
