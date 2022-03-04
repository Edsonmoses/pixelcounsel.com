<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ads;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddAdsComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $position;
    public $image;
    public $startdate;
    public $endate;
    public $postedby;
    public $status;

    public function mount()
    {
        $this->postedby = Auth::user()->name;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'startdate' => 'required',
            'endate' => 'required',
        ]);
    }

    public function storeAds()
    {
        $this->validate([
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'startdate' => 'required',
            'endate' => 'required',
        ]);

        $ads = new Ads();
        $ads->name = $this->name;
        $ads->position = $this->position;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('advertis',$imageName);
        $ads->image = $imageName;
        $ads->startdate = $this->startdate;
        $ads->endate = $this->endate;
        $ads->status = $this->status;
        $ads->postedby = $this->postedby;
        $ads->save();
        session()->flash('message','Ad has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-ads-component')->layout('layouts.backend');
    }
}
