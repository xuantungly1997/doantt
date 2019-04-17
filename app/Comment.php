<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comment_product';
    protected $guarded = [];

    public function product() {
        return $this->hasOne('App\Product','id', 'com_product');
    }
}
