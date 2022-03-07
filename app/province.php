<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    protected $fillable= [
        'name_qh','type','matp'
    ];
    protected $primaryKey = 'maqh';
    protected $table = 'quanhuyen';
}
