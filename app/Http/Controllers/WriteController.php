<?php

namespace App\Http\Controllers;

use App\Models\Write;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Providers\GeminiTextCorrectionService;


class WriteController extends Controller
{

    function writeFinish(Request $request)
    {
        $this->emailController->sendAnswerEmail($request);
        return Inertia::render('Frontend/FinishTest');
    }

    protected $emailController;

    public function __construct(EmailController $emailController)
    {
        $this->emailController = $emailController;
    }

    public function writeText(Request $request, GeminiTextCorrectionService $geminiService)
    {
        $textToCorrect = $request->input('answer'); // Get text from request

        if (empty($textToCorrect)) {
            return Inertia::render('Frontend/Error', ['error' => 'No text provided']);
        }

        $correctedText = $geminiService->correctText($textToCorrect);

        if ($correctedText === null) {
            return Inertia::render('Frontend/Error', ['error' => 'Failed to correct text. See logs for details.']);
        }


        $answer = new Write();
        $answer->w_answer = $correctedText;
        $answer->user_id = auth()->user()->id;
        $answer->save();

        $this->emailController->sendAnswerEmail();


        return Inertia::render('Frontend/FinishTest');
    }
}
