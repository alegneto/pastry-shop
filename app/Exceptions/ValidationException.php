<?php

namespace App\Exceptions;

use Exception;

class ValidationException extends Exception
{
    private $details;

    public function __construct(string $message, $details, int $code = 0)
    {
        parent::__construct($message, $code);
        $this->details = $details;
    }

    public function getDetails()
    {
        return $this->details;
    }
}
