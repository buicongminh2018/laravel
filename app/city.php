<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $fillable= [
        'name_tp','type'
        ];
    protected $primaryKey = 'matp';
    protected $table = 'tinhthanhpho';
}
