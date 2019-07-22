<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class Photo extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
