<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected  $guarded =[];
    public function product(){
        return $this->belongsTo('App\Product','comment_product_id');
    }
}
