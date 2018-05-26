<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //fillables
    protected $fillable = [
        'user_id', 'companyName', 'description', 'location', 'profileImg',
    ];
    //
    public function User(){
        return $this->belongsTo('App\User');
    }
}