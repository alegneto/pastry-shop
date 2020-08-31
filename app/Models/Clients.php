<?php

namespace Api\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'birthday',
        'address',
        'complement',
        'district',
        'zipcode'
    ];
}
