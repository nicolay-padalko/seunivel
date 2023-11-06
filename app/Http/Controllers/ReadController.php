<?php

namespace App\Http\Controllers;

use App\Models\ReadAnswer;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    function store (Request $request)
    {
        $readAnswer = new ReadAnswer();
        $readAnswer->readAnswer_id = $request->input('readAnswer_id');
        $readAnswer->readAnswer = $request->input('readAnswer');
        $readAnswer->user_id = auth()->user()->id;
        $readAnswer->save();
    }
}
