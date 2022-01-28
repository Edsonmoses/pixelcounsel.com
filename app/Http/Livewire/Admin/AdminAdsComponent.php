<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ads;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAdsComponent extends Component
{
    use WithPagination;

    public function deleteAds($id)
    {
        $adverts = Ads::find($id);
        $adverts->delete();
        session()->flash('message','Ad has been deleted successfully!');
    }
    public function render()
    {
        $adverts = Ads::paginate(5);
        return view('livewire.admin.admin-ads-component',['adverts'=>$adverts])->layout('layouts.backend');
    }
}
