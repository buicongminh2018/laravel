<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $guarded =[];
    protected $primaryKey ='product_id';
    public function product(){
        return $this->hasMany('App\comment','product_id');
    }

}
