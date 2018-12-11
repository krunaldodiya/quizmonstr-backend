<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\QuizRepository;
use Carbon\Carbon;
use App\Quiz;

class QuizController extends Controller
{
    protected $quiz;

    public function __construct(QuizRepository $quiz)
    {
        $this->quiz = $quiz;
    }

    public function getAll(Request $request)
    {
        $quiz = Quiz::with('category', 'host')->where('created_at', '>=', Carbon::today())->get();

        return ['quiz' => $quiz];
    }

    public function create(Request $request)
    {
        $now = Carbon::now();
        $registration_expired_at = $now->addMinutes(15);
        $quiz_expired_at = $now->addHour(1);

        $host_id = auth()->user()->id;
        $category_id = $request->category_id;
        $entry_fee = $request->entry_fee;

        $payload = [
            'host_id' => $host_id,
            'category_id' => $category_id,
            'entry_fee' => $entry_fee,
            'registration_expired_at' => $registration_expired_at,
            'quiz_expired_at' => $quiz_expired_at,
        ];

        return $this->quiz->createQuiz($payload);
    }
}
