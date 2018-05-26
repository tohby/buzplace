<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class PostsPhoto extends Model
{
    //
    protected $fillable = [
        'post_id', 'filename',
    ];

    public function posts()
    {
        return $this->belongsTo('App\Posts');
    }
}
