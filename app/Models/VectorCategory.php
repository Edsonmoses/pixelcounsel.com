<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VectorCategory extends Model
{
    use HasFactory;
    protected $table = "vector_categories";

    public function vector()
    {
        return $this->belongsTo(Vectorlogos::class);
    }
}
