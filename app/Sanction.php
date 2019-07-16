<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    public function users ()
    {
        return $this->belongsToMany('App\User', 'sanctions_users', 'sanction_id', 'user_id');
    }
}
