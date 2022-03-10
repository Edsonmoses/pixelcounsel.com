<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hookup extends Model
{
    use HasFactory;
    protected $table="hookups";

    public function categories () {
        return $this->belongsTo('App\Models\HookupCategory', 'hookup_categories_id', 'id');   
    }
}
