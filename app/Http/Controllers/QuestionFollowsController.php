<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use \Auth;

class QuestionFollowsController extends Controller
{
    protected $question;

    /**
     * QuestionFollowsController constructor.
     *
     * @param $question
     */
    public function __construct(QuestionRepository $question)
    {
        $this->question = $question;
    }

    public function index($id)
    {
        $followed = Auth::guard('api')->user()->isQuestionFollows($id);
        if ($followed) {
            return response()->json(['followed' => true]);
        }
        return response()->json(['followed' => false]);
    }

    public function follow(Request $request)
    {
        $id = $request->get('question');
        $question = $this->question->findQuestionById($id);
        $followed = Auth::guard('api')->user()->questionFollowThis($id);

        if (count($followed['attached']) > 0) {
            $question->increment('followers_count');
            return response()->json(['followed' => true]);
        }

        $question->decrement('followers_count');
        return response()->json(['followed' => false]);
    }
}
