<?php

namespace App\Repositories;

use App\Quiz;

use Carbon\Carbon;
use App\Repositories\Contracts\QuizRepositoryInterface;

class QuizRepository implements QuizRepositoryInterface
{
    public function createQuiz($payload)
    {
        return Quiz::create($payload);
    }
}