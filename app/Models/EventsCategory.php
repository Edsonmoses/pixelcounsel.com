<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsCategory extends Model
{
    use HasFactory;
    protected $table = "events_categories";

    public function event()
    {
        return $this->hasOne(Events::class,'events_categories_id');
    }
}
