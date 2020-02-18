<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\PrivateUserResource;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth:api']);
    }

    public function __invoke(Request $request)
    {
        return new PrivateUserResource($request->user());
    }
}
