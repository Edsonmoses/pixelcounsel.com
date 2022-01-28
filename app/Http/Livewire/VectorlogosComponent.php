<?php

namespace App\Http\Livewire;

use App\Models\Ads;
use App\Models\VectorCategory;
use App\Models\Vectorlogos;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class VectorlogosComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $slug;
    public $searchTerm;

    public $image;
    public $downloads = 0;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function export($id)
    {
        $vector = Vectorlogos::where('id', $id)->firstOrFail();

        $vector = Vectorlogos::find($id);
        if($vector->downloads == 0 || $vector->downloads == '')
        {
            $vector->downloads = $this->downloads+1;
        }
        else
        {
            $vector->downloads+= 1;
        }
        $vector->save();

        $download_path = ( public_path() . '/assets/images/vectors/' . $vector->images );
         return( response()->download( $download_path ) && redirect(request()->header('Referer')) );
    }
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        $vector = Vectorlogos::where('name','LIKE',$searchTerm)
                ->orWhere('name','LIKE',$searchTerm)
                ->orWhere('slug','LIKE',$searchTerm)
                ->orWhere('description','LIKE',$searchTerm)
                ->orWhere('designer','LIKE',$searchTerm)
                ->orderBy('id','DESC',$searchTerm)->paginate(12);
                
        $vector = Vectorlogos::where('slug',$this->slug)->orderBy('name','ASC')->first();
        $popular_vectors = Vectorlogos::inRandomOrder()->limit(4)->get();
        $related_vectors = Vectorlogos::where('vector_categories_id',$vector->vector_categories_id)->inRandomOrder()->limit(5)->get();
        $vectorcategories = VectorCategory::all();
        $vectorAds = Ads::all();
        return view('livewire.vectorlogos-component',['vector'=>$vector,'popular_vectors'=>$popular_vectors,'related_vectors'=>$related_vectors,'vectorcategories'=>$vectorcategories,'vectorAds'=>$vectorAds])->layout('layouts.baseapp');
    }
}
