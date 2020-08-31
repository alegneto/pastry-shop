<?php

namespace App\Models\Validation;

class Pastry
{
    const RULES = [
        'name' => 'required|max:100',
        'price' => 'required|numeric',
        'picture' => 'required|ends_with:png|max:50'
    ];
}
