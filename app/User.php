<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'users_roles', 'user_id', 'role_id');
    }

    public function newTag($name)
    {
        $new_tag = '0000';
        $user = User::where('name', $name)->orderBy('tag', 'desc')->first();
        if ($user) {
            $new_tag = sprintf("%04d", (int)$user->tag + 1);
        }
        return $new_tag;
    }
}
