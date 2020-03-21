<?php

namespace App\Http\Controllers\Plant;

use App\Filters\Plant\PlantFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Plants\StorePlant;
use App\Http\Resources\PlantResource;
use App\Image;
use App\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    public function index(Request $request)
    {
        return PlantResource::collection(Plant::with(['user'])->filter($request)->paginate(20));
    }

    public function filters()
    {
        return response()->json([
            'data' => PlantFilters::mappings()
        ], 200);
    }

    public function store(Request $request)
    {
       $plant = $request->user()->plants()->create(
           $request->only('n_vernaculaire', 'ng_latin', 'ne_latin', 'family', 'is_toxic','public')
       );

       $plant->images()->attach($request->image_id);

        return new PlantResource($plant);
    }

    public function show(Plant $plant)
    {
        return new PlantResource($plant);
    }

    public function update(StorePlant $request, Plant $plant)
    {
        $plant->update(
            $request->only('n_vernaculaire', 'ng_latin', 'ne_latin', 'family', 'is_toxic', 'public')
        );
    }

    public function destroy(Plant $plant)
    {

        $i = $plant->images()->first();
        if (isset($i)) {
            $plant->images()->detach($i);

            Storage::disk('public')->delete('images/' . $i->hash_name);

            Image::destroy($i->id);
        }

        $plant->delete();
    }
}
