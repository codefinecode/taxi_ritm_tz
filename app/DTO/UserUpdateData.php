<?php

namespace App\DTO;

readonly class UserUpdateData
{
    public function __construct(
        public ?string $login,
        public ?string $email
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'login' => $this->login,
            'email' => $this->email,
        ]);
    }
}