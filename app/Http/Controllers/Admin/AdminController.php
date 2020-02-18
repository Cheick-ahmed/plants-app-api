<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\PrivateUserResource;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return PrivateUserResource::collection(User::where('is_confirmed', false)->get());
    }

    public function update(Request $request)
    {
        dd($request->input('is_confirmed'));
    }
}
