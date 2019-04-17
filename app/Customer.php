<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    //
    protected $table = 'customer';

    protected $fillable = [
        'email','address','phone','password','name','birthday'
    ];
    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
