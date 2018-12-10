<?php

namespace App\Http\Controllers;

use App\Events\UpdateOrderStatus;

use Goutte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Question;

class TestController extends Controller
{
    public function test(Request $request)
    {
        return Question::with('category')->get();
    }
}
