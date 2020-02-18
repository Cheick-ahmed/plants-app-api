<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginFormRequest;

class loginController extends Controller
{
    public function __invoke(LoginFormRequest $request) {
    	if (!$token = auth()->attempt(request()->only('email','password'))) {
            return response()->json([
               'errors' => [
                   'email' => [
                       'Could not sign you in with those details.'
                   ]
               ]
            ],422);
        }
    	else {
    	    return response()->json([
    	        'data' => [
                    'token' => $token
                ]
            ]);
        }
    }
}
