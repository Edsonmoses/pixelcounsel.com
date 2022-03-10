<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table="events";

    public function categories() {
        return $this->belongsTo('App\Models\EventsCategory', 'events_categories_id', 'id');   
    }

    public function eventtypes() {
        return $this->belongsTo('App\Models\EventType', 'etype_id', 'id');   
    }

    public function eventeype() {
        return $this->belongsTo('App\Models\EventType', 'etype_id', 'id');   
    }
}
