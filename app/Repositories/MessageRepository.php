<?php


namespace App\Repositories;


use App\Message;

class MessageRepository
{
    public function get($where)
    {
        return Message::where($where)->get();
    }

    public function create($data)
    {
        return Message::create($data);
    }
}
