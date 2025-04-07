<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use App\Services\Contracts\UserServiceInterface;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
    public function __construct(
        private UserServiceInterface $userService
    ) {}

    public function index()
    {
        return new UserCollection(
            $this->userService->paginate()
        );    
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        return new UserResource(
            $this->userService->update($user, $request->toDto())
        );
    }

    public function destroy(User $user)
    {
        $this->userService->delete($user);
        return response()->noContent();
    }
}