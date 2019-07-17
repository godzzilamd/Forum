<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function topics()
    {
        return $this->hasMany('App\Topic');
    }

    public function parent()
    {
        return $this->belongsTo('App\Section', 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\Section','parent_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
