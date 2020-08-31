<?php

namespace Api\Models;

use Illuminate\Database\Eloquent\Model;

class Pastries extends Model
{
    protected $table = 'pastries';

    protected $fillable = [
        'name',
        'price',
        'picture'
    ];
}
