<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\PrivateUserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => PrivateUserResource::collection(User::confirmed()->get()),
            'meta' => [
                'not_confirmed' => PrivateUserResource::collection(User::where('is_confirmed', false)->get())
            ]
        ]);
    }

    public function show(User $user)
    {
        return new PrivateUserResource($user);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'is_confirmed' => true
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
