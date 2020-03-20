<?php

namespace App\Http\Controllers\Me;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlantResource;
use App\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return PlantResource::collection($request->user()->plants()->get());
    }
}
