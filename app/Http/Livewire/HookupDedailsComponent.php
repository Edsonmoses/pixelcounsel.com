<?php

namespace App\Http\Livewire;

use App\Models\Hookup;
use Livewire\Component;

class HookupDedailsComponent extends Component
{
    public $hookup_slug;

    public function mount($hookup_slug)
    {
        $this->hookup_slug = $hookup_slug;
    }
    public function render()
    {
        $shareComponent = \Share::page(
            'https://pixelcounsel.com',
            'Online vector logo collection of brands in Africa',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();

        $hookup = Hookup::where('slug',$this->hookup_slug)->orderBy('name','ASC')->first();
        return view('livewire.hookup-dedails-component',['hookup'=>$hookup,'shareComponent'=>$shareComponent])->layout('layouts.baseapp');
    }
}
