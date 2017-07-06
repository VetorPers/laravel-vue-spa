<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['from_user_id', 'to_user_id', 'body'];

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }
}
