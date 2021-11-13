<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jargons extends Model
{
    use HasFactory;
    protected $table="jargons";

    public function atributes()
    {
        return $this->hasMany(AlpFilter::class,'afid');
    }
}
