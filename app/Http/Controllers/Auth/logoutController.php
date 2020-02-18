<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class logoutController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth:api']);
    }

    public function __invoke()
    {
        auth()->logout();
    }
}
