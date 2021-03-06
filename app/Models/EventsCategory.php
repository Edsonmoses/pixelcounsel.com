<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsCategory extends Model
{
    use HasFactory;
    protected $table = "events_categories";

    public function events()
    {
        return $this->hasMany('App\Models\Events', 'events_categories_id');
    }
}
