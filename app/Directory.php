<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    //
    protected $fillable = [
        'name', 'details', 'location',
    ];
}
