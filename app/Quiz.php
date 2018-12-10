<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'host_id', 'category_id', 'entry_fee', 'total_participants', 'total_winners', 'total_questions', 'answerable_questions', 
        'question_ids', 'registration_expired_at', 'quiz_expired_at', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
