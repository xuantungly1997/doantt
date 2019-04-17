<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
       protected $table = 'product';
        protected $fillable = [
            'name','cate_id', 'amount', 'unit_price', 'promotion_price','default_price', 'producter', 'description','status','feauture','file'
        ];
        public function cates() {
            return $this->belongsTo('App\Category','cate_id');
        }

        public function comments() {
            return $this->hasMany('App\Comment','com_product','id');
        }

       public function sizes() {
           return $this->belongsToMany('App\Size');
       }

        public function colors() {
            return $this->belongsToMany('App\Color');
        }

    protected $appends = array('thumb','sale','arrimg');

//implement the attribute
    public function getThumbAttribute()
    {
        $images = $this->file;
        $images = explode("|",$images);
        $images = $images[0];
        if(!$images) {
            $images = '';
        }
        return $images;
    }
    ///appen sale
    public function getSaleAttribute()
    {
        $promotion=$this->promotion_price;
        $unit = $this->unit_price;
        $sale = $unit - (($promotion*$unit)/100);
        return $sale;
    }
    public function getArrimgAttribute(){
        $arrimage = $this->file;
        $arrimage = explode("|",$arrimage);
        if(!$arrimage) {
            $arrimage = '';
        }
        return $arrimage;
    }
}
