<php

namespace App\Services\Contracts;

use App\Models\User;
use App\Services\Dto\UserUpdateDto;
use Illuminate\Contracts\Pagination\Paginator;

interface UserServiceInterface
{
    public function paginate(int $perPage = 10): Paginator;
    public function update(User $user, UserUpdateDto $dto): User;
    public function delete(User $user): void;
}