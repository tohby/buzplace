<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    //
    protected $fillable = [
        'user_id', 'subject', 'message',
    ];
}
