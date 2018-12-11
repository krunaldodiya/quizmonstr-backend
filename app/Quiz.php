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
        'question_meta', 'expired_at', 'created_at', 'updated_at'
    ];

    protected $appends = ['time_remained'];

    protected $dates = ['created_at', 'updated_at'];

    public function getTimeRemainedAttribute()
    {
        $now = Carbon::now();

        if ($now->diffInMinutes($this->expired_at) > 0) {
            return $now->diffInMinutes($this->expired_at) . str_plural(' minute', $now->diffInMinutes($this->expired_at)) . ' left';
        }

        return 'Expired';
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
