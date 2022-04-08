<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jargons extends Model
{
    use HasFactory;
    protected $table="jargons";

    public function categories () {
        return $this->belongsTo('App\Models\JargonCategory', 'jargon_categories_id', 'id');   
    }

    public function atributes()
    {
        return $this->hasMany(AlpFilter::class,'afid');
    }
    public function atribut()
    {
        return $this->belongsTo(AlpFilter::class,'afid');
    }
}
