<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
