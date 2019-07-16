<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function topics()
    {
        return $this->hasMany('App\Topic', 'section_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
