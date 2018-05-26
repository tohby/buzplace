<?php

namespace App;

use App\User;
use App\PostsPhoto;
use App\Profile;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //searchable
    use Searchable;
    public function searchableAs()
    {
        return 'title';
    }
    //
    protected $fillable = [
        'user_id', 'title', 'body', 'price', 'negotiable', 'product', 'quantity', 'image',
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }
    public function PostsPhoto(){
        return $this->hasMany('App\PostsPhoto');
    }
    public function Tags(){
        return $this->belongsToMany(Tag::class);
    }

}
