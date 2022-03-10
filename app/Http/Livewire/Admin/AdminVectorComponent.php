<?php

namespace App\Http\Livewire\Admin;

use App\Models\Vectorlogos;
use Livewire\Component;
use Livewire\WithPagination;

class AdminVectorComponent extends Component
{
    public $totalRecords;
    public $loadAmount = 24;
    
    use WithPagination;

    public function loadMore()
    {
        $this->loadAmount += 12;
    }

    public function mount()
    {
        $this->totalRecords = Vectorlogos::count();
    }

    public function deleteVector($id)
    {
        $vector = Vectorlogos::find($id);
        if($vector->images)
        {
            unlink('assets/images/vectors'.'/'.$vector->images);
        }
        if($vector->image)
        {
            unlink('assets/images/vectors'.'/'.$vector->image);
        }
        $vector->delete();
        session()->flash('message','Vector file has been deleted successfully!');
    }
    
    public function render()
    {
        $vectorlogos = Vectorlogos::paginate(20);
        return view('livewire.admin.admin-vector-component',['vectorlogos'=>$vectorlogos])->layout('layouts.backend');
    }
}
