<?php

namespace App\Http\Livewire\Admin;

use App\Models\JargonCategory;
use App\Models\Subjargoncat;
use Livewire\Component;
use Livewire\WithPagination;

class AdminJargonCategoryComponent extends Component
{
    use WithPagination;
    public function deleteJargon($id)
    {
        $jargon = JargonCategory::find($id);
        $jargon->delete();
        session()->flash('message', 'Jargon Category has been deleted successfully!');
    }
    public function render()
    {
        $jargons = Subjargoncat::doesntHave('JargonCategory')->orderBy('id', 'DESC')->paginate(20, ['*'], 'jargons');
        $subjargoncats = Subjargoncat::all();
        return view('livewire.admin.admin-jargon-category-component', ['jargons' => $jargons, 'subjargoncats' => $subjargoncats])->layout('layouts.backend');
    }
}
