<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phi_ship extends Model
{
    protected  $guarded =[];
    public function city(){
        return $this->belongsTo('App\city','phi_ship_matp');
    }
    public function province(){
        return $this->belongsTo('App\province','phi_ship_maqh');
    }
    public function wards(){
        return $this->belongsTo('App\wards','phi_ship_maxa');
    }
}
