<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnswerController extends Controller
{
    function store (Request $request)
    {
        $answer = new Answer();
        $answer->answer_id = $request->input('answer_id');
        $answer->answer = $request->input('answer');
        $answer->user_id = auth()->user()->id;
        $answer->save();
    }
}
