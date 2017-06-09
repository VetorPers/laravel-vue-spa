<?php

namespace App\Repositories;


use App\Answer;

class AnswerRepository
{
    public function create(array $data)
    {
        return Answer::create($data);
    }
}
