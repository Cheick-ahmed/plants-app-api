<?php

namespace App\Http\Controllers\Plant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Plants\StorePlant;
use App\Http\Resources\PlantResource;
use App\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index()
    {
        return PlantResource::collection(Plant::with(['user'])->get());
    }

    public function store(StorePlant $request)
    {

        $plant = $request->user()->plants()->create(
            $request->only('n_vernaculaire', 'ng_latin', 'ne_latin', 'family', 'is_toxic')
        );

        return new PlantResource($plant);
    }

    public function show(Plant $plant)
    {
        return new PlantResource($plant);
    }

    public function update(StorePlant $request, Plant $plant)
    {
        $plant->update(
            $request->only('n_vernaculaire', 'ng_latin', 'ne_latin', 'family', 'is_toxic')
        );
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();
    }
}
