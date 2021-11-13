<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminBlogComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-blog-component')->layout('layouts.backend');
    }
}
