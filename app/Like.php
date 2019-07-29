<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // protected $with = ['user', 'posts'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    // public function isMyLike($post) {
        
    //     if ($this->user_id == Auth::user()->id && $this->post_id == $post->id)
    //         return true;
    //     return false;
    // }
}
