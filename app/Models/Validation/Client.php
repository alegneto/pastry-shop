<?php

namespace App\Models\Validation;

use Illuminate\Http\Request;

class Client
{
    const RULES = [
        'name' => 'required|max:120',
        'email' => 'required|email|unique:clients,email',
        'phone' => 'required|digits_between:10,11',
        'birthday' => 'required|date_format: "Y-m-d"',
        'address' => 'required|max:250',
        'complement' => 'max:50',
        'district' => 'required|max:100',
        'zipcode' => 'required|digits:8'
    ];

}
