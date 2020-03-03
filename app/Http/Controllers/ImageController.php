<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __invoke(Request $request)
    {

        $uploadedFile = $request->file('image');

        Storage::disk('public')->put(
            'images/',
            $uploadedFile
        );

        $image = new Image();
        $image->name = $uploadedFile->getClientOriginalName();
        $image->hash_name = $hash = $uploadedFile->hashName();
        $image->path = asset('storage/images/' . $hash );

        $image->save();

        return response()->json([
            'id' => $image->id,
            'name' => $image->name,
            'path' => $image->path
        ]);
    }
}
