<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'parent_id', 'title', 'avatar',
    ];

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

    public function lastPost()
    {
        $post = Post::whereIn('id', $this->topics()->pluck('id'))->orderBy('created_at')->first();
        return $post->topic;
    }
}
