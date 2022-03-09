<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table="events";

    protected $fillable = ['events_categories_id'];

    public function Category() 
{
    return $this->belongsTo(EventsCategory::class);
}
}
