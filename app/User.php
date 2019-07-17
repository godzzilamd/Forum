<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role_id', 'email', 'password', 'tag',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }

    public function friendLists()
    {
        return $this->belongsToMany('App\User', 'friend_lists', 'user_id_1', 'user_id_2');
    }

    public function blackLists()
    {
        return $this->belongsToMany('App\User', 'black_lists', 'user_id_1', 'user_id_2');
    }

    public function sanctions()
    {
        return $this->belongsToMany('App\Sanction', 'sanctions_users', 'user_id', 'sanction_id');
    }

    public function posts()
    {
        return $this->hasMAny('App\Post', 'user_id', 'id');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Post', 'likes', 'user_id', 'post_id');
    }

    public function photos() {
        return $this->hasMany('App\Photo', 'user_id', 'id');
    }

    // public function newTag($name)
    // {
    //     $new_tag = '0000';
    //     $user = User::where('name', $name)->latest('tag')->first();
    //     if ($user) {
    //         if ((int)$user->tag == 9999) {
    //             if (User::where('name', $name)->count() == 9999)
    //                 return false;
    //             else {
    //                 for ($i = 0; $i < 10000; $i++)
    //                     if (!User::where('tag', $i)->exists()) {
    //                         $new_tag = sprintf("%04d", $i);
    //                         break;
    //                     }
    //             }
    //         }
    //         else
    //             $new_tag = sprintf("%04d", (int)$user->tag + 1);
    //     }
    //     return $new_tag;
    // }
}
