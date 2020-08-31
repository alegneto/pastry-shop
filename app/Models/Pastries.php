<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pastries extends Model
{
    use SoftDeletes;

    protected $table = 'pastries';

    protected $fillable = [
        'name',
        'price',
        'picture'
    ];
}
