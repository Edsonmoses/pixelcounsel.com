<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hookup;
use Livewire\Component;

class AdminHookupComponent extends Component
{
    public $selected = [];

    public function activate()
    {
        if (!empty($this->selected)) {
            Hookup::whereIn('id', $this->selected)->update(['hookup_status' => 'published']);
            $this->selected = [];
        }
    }
    public function deleteVector($id)
    {
        $hookup = Hookup::find($id);
        if ($hookup->images) {
            unlink('assets/images/hookups' . '/' . $hookup->images);
        }
        if ($hookup->image) {
            unlink('assets/images/hookups' . '/' . $hookup->image);
        }
        $hookup->delete();
        session()->flash('message', 'Hookup file has been deleted successfully!');
    }

    public function render()
    {
        $hookups = Hookup::orderBy('created_at', 'DESC')->paginate(20, ['*'], 'hookups');
        return view('livewire.admin.admin-hookup-component', ['hookups' => $hookups])->layout('layouts.backend');
    }
}
