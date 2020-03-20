<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlantResource;
use App\Plant;
use App\User;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function __invoke(User $user)
    {
        return PlantResource::collection($user->plants()->public()->get());
    }
}
