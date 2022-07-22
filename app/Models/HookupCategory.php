<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HookupCategory extends Model
{
    use HasFactory;
    protected $table = "hookup_categories";

    public function hookup()
    {
        return $this->hasMany('App\Models\Hookup', 'hookup_categories_id');
    }
}
