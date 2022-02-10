<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ads;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditAdsComponent extends Component
{ 
    use WithFileUploads;
    public $ads_id;
    public $name;
    public $position;
    public $image;
    public $startdate;
    public $endate;
    public $status;
    public $newimage;
    public $postedby;

    public function mount($name)
    {
        $this->name = $name;
        $ads = Ads::where('name',$name)->first();
        $this->ads_id = $ads->id;
        $this->position = $ads->position;
        $this->image = $ads->image;
        $this->startdate = $ads->startdate;
        $this->endate = $ads->endate;
        $this->status = $ads->status;
        $this->postedby = Auth::user()->name;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'position' => 'required',
            'startdate' => 'required',
            'endate' => 'required',
            'status' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:jpeg,png,jpg',
            ]);
        }
    }

    public function updateAds()
    {
        $this->validate([
            'name' => 'required',
            'position' => 'required',
            'startdate' => 'required',
            'endate' => 'required',
            'status' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png,jpg',
            ]);
        }

        $ads = Ads::find($this->ads_id);
        $ads->name = $this->name;
        $ads->position = $this->position;
          if ($this->newimage) {
            //unlink('images/advertis'.'/'.$ads->image);
            $path = public_path('assets/brands/images/advertis'.'/'.$ads->image);
            if (is_file($path)){
            unlink($path);
            }
            $imagName = Carbon::now()->timestamp. '.'.$this->newimage->extension();
            $this->newimage->storeAs('advertis', $imagName);
            $ads->image = $imagName;
        }
        $ads->startdate = $this->startdate;
        $ads->endate = $this->endate;
        $ads->status = $this->status;
        $ads->postedby = $this->postedby;
        $ads->save();
        session()->flash('message','Ad has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-ads-component')->layout('layouts.backend');
    }
}
