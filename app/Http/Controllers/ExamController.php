<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class ExamController extends Controller
{
    public function exam(){
        $questions = Question::all();

        // Shuffle the questions to randomize their order
        $shuffled_questions = $questions->shuffle();
    
        // Select the first 10 questions from the shuffled list
        $selected_questions = $shuffled_questions->take(10);
    
        // Return view with selected questions
        return view('student.exam.exam', ['questions' => $selected_questions]);
    }
}
