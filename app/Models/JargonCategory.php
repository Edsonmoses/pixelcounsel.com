<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JargonCategory extends Model
{
    use HasFactory;
    protected $table = "jargon_categories";

    public function hookup() {
        return $this->hasMany('App\Models\Jargons', 'jargon_categories_id');    
    }
    
    public function atributes()
    {
        return $this->hasMany(AlpFilter::class,'afid');
    }
}
