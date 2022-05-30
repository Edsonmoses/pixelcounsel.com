<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vectorlogos extends Model
{
    use HasFactory;
    protected $table="vectorlogos";
    protected $fillable = ['postedby,contributor'];

    public function vectorcategory()
    {
        return $this->hasMany(VectorCategory::class, 'vector_categories_id');
    }
}
