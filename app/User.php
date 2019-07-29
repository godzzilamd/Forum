<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // protected $with = ['likes'];

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

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function friends()
    {
        return $this->belongsToMany('App\User', 'friend_lists', 'user_id', 'friend_id');
    }

    public function enemies()
    {
        return $this->belongsToMany('App\User', 'black_lists', 'user_id', 'enemy_id');
    }

    public function sanctions()
    {
        return $this->belongsToMany('App\Sanction');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Post', 'likes');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function newTag()
    {
        $new_tag = '0000';
        $user = User::where('name', $this->name)->latest('tag')->first();
        if ($user) {
            if ((int)$user->tag == 9999) {
                if (User::where('name', $this->name)->count() == 9999)
                    return false;
                else {
                    for ($i = 0; $i < 10000; $i++)
                        if (!User::where('tag', $i)->exists()) {
                            $new_tag = sprintf("%04d", $i);
                            break;
                        }
                }
            }
            else
                $new_tag = sprintf("%04d", (int)$user->tag + 1);
        }
        return $new_tag;
    }

    public function hasRole($role)
    {
        if ($this->role_id == $role->id)
            return true;
        return false;
    }

    public function hasPermission($permission)
    {
        if ($this->role->permissions->contains($permission))
            return true;
        return false;
    }
}