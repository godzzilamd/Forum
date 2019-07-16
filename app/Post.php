<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes', 'post_id', 'user_id');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic', 'topic_id', 'id');
    }
}
