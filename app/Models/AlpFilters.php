<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlpFilters extends Model
{
    use HasFactory;
    protected $table = "alp_filters";

    protected $fillable = [
        'name',
        'postedby',
        'category_id',
    ];

    public function category()
    {
        $this->belongsTo(Category::class);
    }
}
