<?php

namespace App\Services\Contracts;

use App\Models\User;
use App\DTO\UserUpdateData;
use Illuminate\Contracts\Pagination\Paginator;

interface UserServiceInterface
{
    public function paginate(int $perPage = 10): Paginator;
    public function update(User $user, UserUpdateData $dto): User;
    public function delete(User $user): void;
}
