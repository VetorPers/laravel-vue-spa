<?php
/**
 * Created by PhpStorm.
 * User: qianchen
 * Date: 2017/5/27
 * Time: 16:04
 */

namespace App\Repositories;


use App\Question;

class QuestionRepository
{
    public function getQuestions()
    {
        return Question::published()->latest()->with('user')->get();
    }

    public function findQuestionById($id)
    {
        return Question::find($id);
    }
}
