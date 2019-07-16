<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post', 'topic_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id', 'id');
    }
}
