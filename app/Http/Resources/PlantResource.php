<?php

namespace App\Http\Resources;

use App\Http\Resources\User\PrivateUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PlantResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'family' => $this->family,
            'n_vernaculaire' => $this->n_vernaculaire,
            'ng_latin' => $this->ng_latin,
            'ne_latin' => $this->ne_latin,
            'is_toxic' => $this->is_toxic,
            'author' => [
                'data' => new PrivateUserResource($this->user)
            ],
            'display' => [
                'data' => new ImageResource($this->images()->first())
            ],
        ];
    }
}
