<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'from_date', 'to_date', 'days'];

    public function getDaysAttribute()
    {
        return explode(' ', $this->attributes['days']);
    }
}
