<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VectorCategory extends Model
{
    use HasFactory;
    protected $table = "vector_categories";

    public function hookup() {
        return $this->hasMany(Vectorlogos::class, 'jargon_categories_id');    
    }
}
