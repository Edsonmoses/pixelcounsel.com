<?php

namespace App\Http\Livewire\User;

use App\Models\Events;
use App\Models\Hookup;
use App\Models\Vectorlogos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserNotification extends Component
{
    public $approved;
     public function updateVector($approved)
    {
        $vector = Vectorlogos::find($approved);
        $vector->approved = '0';
        $vector->save();
    }
     public function updateHookup($id)
    {
        $hookup = Hookup::find($id);
        $hookup->approved = '0';
        $hookup->save();
    }
     public function updateEvent($approved)
    {
        $event = Events::find($approved);
        $event->approved = '0';
        $event->save();
      
    }

    public function render()
    {
        $vectors = Vectorlogos::where('contributor',Auth::user()->name)->where('vector_status','published')->orderBy('vector_status','ASC')->where('approved','>=',1)->latest()->paginate(10,['*'],'vector');
        $hookup = Hookup::where('postedby',Auth::user()->name)->where('hookup_status','published')->orderBy('name','ASC')->where('approved','>=',1)->latest()->paginate(10,['*'],'hookup');
        $events = Events::where('postedby',Auth::user()->name)->where('events_status','published')->orderBy('name','ASC')->where('approved','>=',1)->latest()->paginate(10,['*'],'event');

        $approveds = Vectorlogos::where('contributor',Auth::user()->name)->where('approved','>=',1)->where('vector_status','published')->latest()->count();
        $hookupA = Hookup::where('postedby',Auth::user()->name)->whereDate('open','<=',Carbon::now())->where('hookup_status','published')->where('approved','>=',1)->latest()->count();
        $eventsA = Events::where('postedby',Auth::user()->name)->where('approved','>=',1)->where('events_status','published')->latest()->count();

        $approve = $approveds + $hookupA + $eventsA;

        return view('livewire.user.user-notification',['vectors'=>$vectors,'hookup'=>$hookup,'events'=>$events,'approve'=>$approve]);
    }
}
