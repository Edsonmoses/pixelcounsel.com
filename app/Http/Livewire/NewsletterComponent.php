<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Newsletter;

class NewsletterComponent extends Component
{
    public $email;

    public function store()
    {
        if ( ! Newsletter::isSubscribed($this->email) ) 
        {
            Newsletter::subscribePending($this->email);
            return redirect()->back()->with('success', 'Thanks For Subscribe');
        }
        return redirect()->back()->with('failure', 'Sorry! You have already subscribed ');
    }
    public function render()
    {
        return view('livewire.newsletter-component');
    }
}
