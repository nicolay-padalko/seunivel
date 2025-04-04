<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use Illuminate\Http\Request;

class ReadController extends Controller
{

    function store (Request $request)
    {

        $readAnswer = new Reading();
        $readAnswer->r_answer_id = $request['r_answer_id'];
        $readAnswer->r_answer = $request['r_answer'];
        $readAnswer->user_id = auth()->user()->id;
        $readAnswer->save();

    }

   
}
