<?php

namespace App\Http\Controllers;

use App\Models\ChatAnswer;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function chat(Request $request)
    {

        $userAnswer = $request->input('answer');

        $prompt = "Correct this text as email answer, goal to have 150 words, rate it from 0 to 10\n\n this is teh email that i am answering \n\n Hi Helga, I've been meaning to write to you for ages now so don't worry! How is work? And the family, I’d love to hear your news!!!! As for me, I'll have been in the new job three months by the end of next week so I'm feeling more settled in. At first I felt like I had no idea what I was doing but now I realise it's normal to feel like that . There was a lot to learn – there still is actually – and I soon had to get used to the idea that I can't know everything. I used to work late a lot and at weekends but I'm slowly getting into a normal routine . Which means I'd love to come and visit! We really need a good catch up! I can't believe we haven't seen each other since Carl's wedding . How does next month sound ? Anyway, I'd better get back to work. Please do write and share your news Love, Linda Hi Linda,";

        $prompt .= $userAnswer;

        $response = Http::post('https://api.openai.com/v1/engines/davinci/completions', [
            'prompt' => $prompt,
            'max_tokens' => 150, // Adjust the max tokens as needed
            'temperature' => 0.7, // Adjust the temperature as needed
        ])->header('Authorization', 'Bearer ' . env('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'));

        $responseData = $response->json();

        // Extract the corrected answer and grade
        $correctedAnswer = $responseData['choices'][0]['text'];
        $grade = $responseData['choices'][0]['metadata']['grade'];

        // Save the corrected answer to the database
        $this->store($correctedAnswer);

        return response()->json([
            'message' => 'Answer sent to ChatGPT',
            'userAnswer' => $userAnswer,
            'correctedAnswer' => $correctedAnswer,
            'grade' => $grade,
        ]);


        function store($correctedAnswer)
        {
            $chatAnswer = new ChatAnswer();
            $chatAnswer->chatAnswer = $correctedAnswer;
            $chatAnswer->save();

        }
    }
}
