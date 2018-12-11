<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Quiz extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'host_id', 'category_id', 'entry_fee', 'total_participants', 'total_winners', 'total_questions', 'answerable_questions',
        'question_meta', 'registration_expired_at', 'quiz_expired_at', 'created_at', 'updated_at'
    ];

    protected $appends = ['published_at'];

    protected $dates = ['created_at', 'updated_at'];

    public function getPublishedAtAttribute()
    {
        $date = $this->attributes['created_at'];

        return (new Carbon($date))->diffForHumans();
    }

    public function host()
    {
        return $this->hasOne(User::class, 'id', 'host_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
