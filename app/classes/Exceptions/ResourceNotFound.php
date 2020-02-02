<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class ResourceNotFound extends Exception
{
    public function __construct(
        string $message = 'app.resource-not-found',
        int $code = 1
    ) {
        parent::__construct($message, $code);
    }
}
