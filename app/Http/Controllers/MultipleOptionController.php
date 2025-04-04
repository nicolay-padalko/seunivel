<?php

namespace App\Http\Controllers;

use App\Models\MultipleOption;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MultipleOptionController extends Controller
{
    function store (Request $request)
    {
        $mo_answer = new MultipleOption();
        $mo_answer->mo_answer_id = $request->input('mo_answer_id');
        $mo_answer->mo_answer = $request->input('mo_answer');
        $mo_answer->user_id = auth()->user()->id;
        $mo_answer->save();
    }
}
