<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $lists = Question::all();
        return view('questions.index', compact('lists'));
    }

    public function show($id)
    {
        $inf = Question::find($id);
        return view('questions.show', compact('inf'));
    }
}
