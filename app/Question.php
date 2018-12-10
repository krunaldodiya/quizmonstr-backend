<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id', 'category_id', 'question', 'answer', 'option_1', 'option_2', 'option_3', 'option_4', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
