<?php

namespace App\Services;

use App\Exceptions\AdminUpdateException;
use App\Models\User;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Contracts\Pagination\Paginator;

use App\DTO\UserUpdateData;

class UserService implements UserServiceInterface
{
    public function paginate(int $perPage = 10): Paginator
    {

        return User::query()
            // ->where('id', '!=', 1)
            ->paginate($perPage);    
        }

    public function update(User $user, UserUpdateData $data): User
    {
        $user->update($data->toArray());
        return $user->fresh();
    }

    public function delete(User $user): void
    {
        if ($user->isAdmin()) {
            throw new AdminDeletionException($user->id);
        }

        $user->delete();
    }
}
