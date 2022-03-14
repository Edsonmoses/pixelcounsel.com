<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Vectorlogos;
use Google\Service\ServiceControl\Auth;
use Livewire\Component;

class AccountStatusComponent extends Component
{
    public $confirm_status_at;
    public function updateStatus()
    {
        $user = User::find(Auth::user()->id);
        $user->confirm_status_at = $this->confirm_status_at;
        $user->save();
    }
    public function render()
    {
        return view('livewire.user.account-status-component')->layout('layouts.userbackend');
    }
}
