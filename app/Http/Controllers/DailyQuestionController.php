<?php

namespace App\Http\Controllers;
use App\Models\DailyQuestion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DailyQuestionController extends Controller
{
    public function getDailyQuestion()
    {
        $today = Carbon::today()->toDateString();

        $question = DailyQuestion::where('date', $today)->first();

        if (!$question) {
            return response()->json(['message' => 'No question for today'], 404);
        }

        return response()->json([
            'question' => $question->question,
            'options' => json_decode($question->options),
            'correct_answer' => $question->correct_answer,
        ]);
    }
}
