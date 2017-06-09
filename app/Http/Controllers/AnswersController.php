<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Repositories\AnswerRepository;
use Illuminate\Http\Request;
use Auth;

class AnswersController extends Controller
{
    protected $answer;

    /**
     * AnswersController constructor.
     *
     * @param $answer
     */
    public function __construct(AnswerRepository $answer)
    {
        $this->answer = $answer;
    }

    public function answer($id, StoreAnswerRequest $request)
    {
        $data = [
            'user_id' => Auth::id(),
            'question_id' => $id,
            'body' => $request->get('body')
        ];
        $answer = $this->answer->create($data);

        $answer->question()->increment('answers_count');
        Auth::user()->increment('answers_count');

        return back();
    }
}
