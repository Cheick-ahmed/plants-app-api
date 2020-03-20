<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileFormRequest;
use App\Http\Resources\User\PrivateUserResource;
use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        return new PrivateUserResource($user);
    }

    /**
     * @param User $user
     * @param ProfileFormRequest $request
     */
    public function update(User $user, ProfileFormRequest $request)
    {
        $user->update(
            $request->only('first_name', 'last_name', 'email', 'password')
        );
    }
}
