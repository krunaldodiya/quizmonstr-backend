<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Category extends Model
{
    protected $fillable = [
        'name', 'created_at', 'updated_at',
    ];

    protected $appends = ['published_at'];

    protected $dates = ['created_at', 'updated_at'];

    public function getPublishedAtAttribute()
    {
        $date = $this->attributes['created_at'];

        return (new Carbon($date))->diffForHumans();
    }
}
