<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use Carbon\Carbon;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $user = auth()->user();
        $user->load('quiz');
        
        return $user;
    }
}
