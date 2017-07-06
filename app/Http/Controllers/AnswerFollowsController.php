<?php

namespace App\Http\Controllers;

use App\Repositories\AnswerRepository;
use Illuminate\Http\Request;
use \Auth;

class AnswerFollowsController extends Controller
{
    protected $answer;

    /**
     * AnswerFollowsController constructor.
     *
     * @param $answer
     */
    public function __construct(AnswerRepository $answer)
    {
        $this->answer = $answer;
    }

    public function index($id)
    {
        $followed = Auth::guard('api')->user()->isAnswerLike($id);
        if ($followed) {
            return response()->json(['followed' => true]);
        }
        return response()->json(['followed' => false]);
    }

    public function follow(Request $request)
    {
        $id = $request->get('answer');
        $answer = $this->answer->findAnswerById($id);
        $followed = Auth::guard('api')->user()->answerLikeThis($id);

        if (count($followed['attached']) > 0) {
            $answer->increment('votes_count');
            return response()->json(['followed' => true]);
        }

        $answer->decrement('votes_count');
        return response()->json(['followed' => false]);
    }
}
