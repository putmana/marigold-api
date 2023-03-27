<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'artists' => ArtistResource::collection($this->artists),
            'category' => $this->category,
            'year' => $this->release_year,
            'cover' => [
                'path' => $this->cover->path,
                'color' => $this->cover->color,
            ],
        ];
    }
}
