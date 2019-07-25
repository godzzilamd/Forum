<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'topic_id', 'body', 'isnew',
    ];  

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function isMyLike() {
        return $this->likes()
            ->where('id', auth()->user()->id)
            ->first();
    }
}