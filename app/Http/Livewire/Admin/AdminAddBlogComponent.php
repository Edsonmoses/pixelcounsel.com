<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminAddBlogComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-add-blog-component')->layout('layouts.backend');
    }
}
