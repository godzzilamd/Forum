<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->hasMany('App\User', 'role_id', 'id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'permissions_roles', 'role_id', 'permission_id');
    }
}
