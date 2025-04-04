<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Write;
use App\Models\Reading;
use Illuminate\Support\Facades\Mail;
use App\Mail\RespostasMail;
use App\Models\MultipleOption;
use App\Models\User;

class EmailController extends Controller
{
    public function sendAnswerEmail(Request $request)
    {
        $multipleOption = MultipleOption::all();
        $reading = Reading::all();
        $write = Write::all();
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        Mail::to('contato@akulamotion.com.br')->send(new RespostasMail([
            'multipleOption' => $multipleOption,
            'reading' => $reading,
            'write' => $write,
            'userName' => $user->name,
        ]));

        return response()->json(['message' => 'Email sent successfully']);
    }
}
