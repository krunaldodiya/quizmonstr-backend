<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class QuizRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'QuizRepository';
    }
}