<?php

namespace App\Models\Validation;

class Order
{
    const RULES = [
        'client_id' => 'required|exists:clients,id',
        'pastry_id' => 'required|exists:pastries,id',
        'quantity' => 'required|integer|gte:0'
    ];
}
