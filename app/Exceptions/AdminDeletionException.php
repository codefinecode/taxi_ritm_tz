<?php

namespace App\Exceptions;

use Exception;

class AdminDeletionException extends Exception
{
    public function __construct(
        public int $userId,
        string $message = "Admin user cannot be deleted",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
    
    public function getUserId(): int
    {
        return $this->userId;
    }
}