<?php

namespace App\Repositories;


use App\Question;
use App\Topic;

class QuestionRepository
{
    public function getQuestions()
    {
        return Question::published()->latest()->with('user')->get();
    }

    public function findQuestionById($id)
    {
        return Question::with('answers.comments')->find($id);
    }

    //更新问题的标签
    public function normalizeTopics(array $topics)
    {
        return collect($topics)->map(function ($topic) {
            if (is_numeric($topic)) {
                Topic::find($topic)->increment('questions_count');
                return (int)$topic;
            }
            $newTopic = Topic::create(['name' => $topic, 'questions_count' => 1]);
            return $newTopic->id;
        })->toArray();
    }

    public function create(array $data)
    {
        return Question::create($data);
    }
}
