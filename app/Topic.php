<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;

    protected $with = ['posts'];

    protected $fillable = [
        'title', 'body', 'post_it', 'closed'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
