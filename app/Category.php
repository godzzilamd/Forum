<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    public function sections()
    {
        return $this->hasMany('App\Section');
    }

    public function parents()
    {
        return $this->sections()->where('parent_id', null);
    }

    public function with_vars()
    {
        return $this->sections()->where('parent_id', null)->load('topics.posts');
    }
}
