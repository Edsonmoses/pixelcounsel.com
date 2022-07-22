<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjargoncat extends Model
{
    use HasFactory;
    protected $table = "subjargoncats";

    protected $fillable = [
        'id',
        'name',
        'postedby',
        'jargoncategory_id',
    ];

    public function jcategory()
    {
        $this->belongsTo(JargonCategory::class);
    }
}
