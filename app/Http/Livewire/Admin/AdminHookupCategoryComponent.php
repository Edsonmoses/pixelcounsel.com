<?php

namespace App\Http\Livewire\Admin;

use App\Models\HookupCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminHookupCategoryComponent extends Component
{
    use WithPagination;
    public function deleteEvent($id)
    {
        $hookup = HookupCategory::find($id);
        $hookup->delete();
        session()->flash('message','Hookup Category has been deleted successfully!');
    }
    public function render()
    {
        $hookups = HookupCategory::paginate(20,['*'],'hookups');
        return view('livewire.admin.admin-hookup-category-component',['hookups'=>$hookups])->layout('layouts.backend');
    }
}
