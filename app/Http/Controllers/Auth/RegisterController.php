<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterFormRequest;
use App\Http\Resources\User\PrivateUserResource;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(RegisterFormRequest $request)
    {
       $user = User::create([
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'email' => $request->email,
           'is_confirmed' => false,
           'password' => bcrypt($request->password)
       ]);

       return new PrivateUserResource($user);
    }
}
