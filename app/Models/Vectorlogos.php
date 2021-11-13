<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vectorlogos extends Model
{
    use HasFactory;
    protected $table="vectorlogos";
    
    public function vectorcategory()
    {
        return $this->belongsTo(VectorCategory::class,'vector_categories_id');
    }
}
