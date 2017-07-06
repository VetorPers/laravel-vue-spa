<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Auth;

class QuestionsController extends Controller
{
    protected $questionRepository;

    /**
     * QuestionController constructor.
     *
     * @param $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->middleware('auth')->except(['index', 'show']);
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

    public function store(StoreQuestionRequest $request)
    {
        $topics = $this->questionRepository->normalizeTopics($request->get('topics'));

        $data = [
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'user_id' => Auth::id()
        ];
        $question = $this->questionRepository->create($data);
        Auth::user()->increment('questions_count');

        $question->topics()->attach($topics);

        return redirect()->route('questions.show', [$question->id]);
    }
}
