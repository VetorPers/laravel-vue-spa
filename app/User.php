<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarAttribute($value)
    {
        return asset($value);
    }

    //用户关注的人
    public function followings()
    {
        return $this->belongsToMany(self::class, 'user_follows', 'follower_id', 'followed_id')->withTimestamps();
    }

    //用户的粉丝
    public function followers()
    {
        return $this->belongsToMany(self::class, 'user_follows', 'followed_id', 'follower_id');
    }

    //关注用户
    public function followThisUser($user)
    {
        return $this->followings()->toggle($user);
    }

    //用户关注问题表关系
    public function questionFollows()
    {
        return $this->belongsToMany(Question::class, 'question_follows')->withTimestamps();
    }

    //用户是否关注问题
    public function isQuestionFollows($question)
    {
        return $this->questionFollows()->where('question_id', $question)->count();
    }

    //用户关注问题
    public function questionFollowThis($question)
    {
        return $this->questionFollows()->toggle($question);
    }

    //用户点赞回答表关系
    public function answerLikes()
    {
        return $this->belongsToMany(Answer::class, 'answer_follows')->withTimestamps();
    }

    //用户是否点赞回答
    public function isAnswerLike($answer)
    {
        return $this->answerLikes()->where('answer_id', $answer)->count();
    }

    //用户点赞回答
    public function answerLikeThis($answer)
    {
        return $this->answerLikes()->toggle($answer);
    }

    //发送的私信
    public function fromMessages()
    {
        return $this->hasMany(Message::class, 'from_user_id');
    }

    //收到的私信
    public function toMessages()
    {
        return $this->hasMany(Message::class, 'to_user_id');
    }
}
