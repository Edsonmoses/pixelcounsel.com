<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JargonCategory extends Model
{
    use HasFactory;
    protected $table = "jargon_categories";

      protected $fillable = [
        'name',
        'slug',
    ];

    public function jargons() {
        return $this->hasMany(Jargons::class);  
          
    }
    
    public function atributes()
    {
        return $this->hasMany(AlpFilters::class,'afid');
    }
    public function atributed()
    {
        return $this->hasMany(AlpFilters::class,'category_id');
    }
}
