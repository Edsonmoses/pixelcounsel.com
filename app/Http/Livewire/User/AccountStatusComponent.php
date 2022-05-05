<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AccountStatusComponent extends Component
{
    public $totalRecords;
    public $loadAmount = 24;

    public $confirm_status_at;
    public $searchTerm;

    public function loadMore()
    {
        $this->loadAmount += 12;
    }

    public function mount()
    {
        $this->confirm_status_at = 1;
    }

    public function updateConfirmation()
    {
        $user = User::find(Auth::user()->id);
        $user->confirm_status_at = $this->confirm_status_at;
        $user->save();
        return redirect('/vector');
    }
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        $vectorlogos = Vectorlogos::where('name','LIKE',$searchTerm)
                ->orWhere('name','LIKE',$searchTerm)
                ->orWhere('slug','LIKE',$searchTerm)
                ->orWhere('description','LIKE',$searchTerm)
                ->orWhere('designer','LIKE',$searchTerm)
                ->orWhere('vtag','LIKE',$searchTerm)
                ->orderBy('updated_at','ASC',$searchTerm)->paginate(15,['*'],'vectors');

        $vectorcategories = VectorCategory::all()->sortBy('name');
        return view('livewire.user.account-status-component',['vectorlogos'=>$vectorlogos,'vectorcategories'=>$vectorcategories])->layout('layouts.baseapp');
    }
}
