<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionRepository;

    /**
     * QuestionController constructor.
     *
     * @param $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function index()
    {
        $lists = $this->questionRepository->getQuestions();
        return view('questions.index', compact('lists'));
    }

    public function show($id)
    {
        $inf = $this->questionRepository->findQuestionById($id);
        return view('questions.show', compact('inf'));
    }

    public function create()
    {
        return view('questions.add');
    }
}
