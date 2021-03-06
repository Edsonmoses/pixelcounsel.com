<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JargonCategory extends Model
{
    use HasFactory;
    protected $table = "jargon_categories";
    protected $fillable = [
        'id',
        'name',
        'slug',
        'postedby',
    ];
    public function sfilters()
    {
        return $this->hasMany(Subjargoncat::class, 'jargoncategory_id');
    }
}
