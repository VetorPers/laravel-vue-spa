<?php

namespace App\Repositories;


use App\Answer;

class AnswerRepository
{
    public function findAnswerById($id)
    {
        return Answer::find($id);
    }

    public function create(array $data)
    {
        return Answer::create($data);
    }
}
