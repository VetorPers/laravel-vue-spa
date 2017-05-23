<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'body', 'answer_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
