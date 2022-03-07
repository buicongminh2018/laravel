<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wards extends Model
{
    protected $fillable= [
        'name_xa','type','maqh'
    ];
    protected $primaryKey = 'xaid';
    protected $table = 'xaphuongthitran';
}
