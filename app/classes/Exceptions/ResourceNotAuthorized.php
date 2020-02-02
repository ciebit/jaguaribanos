<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class ResourceNotAuthorized extends Exception
{
    public function __construct(
        string $message = 'app.resource-not-authorized',
        int $code = 2
    ) {
        parent::__construct($message, $code);
    }
}
