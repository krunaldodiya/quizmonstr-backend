<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use Carbon\Carbon;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $quiz = Quiz::with('category', 'host')->where('created_at', '>=', Carbon::today())->get();

        return ['quiz' => $quiz];
    }
}
