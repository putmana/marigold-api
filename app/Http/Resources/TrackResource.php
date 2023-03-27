<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrackResource extends JsonResource
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
            'duration' => $this->duration,
            'cover' => [
                'path' => $this->album->cover->path,
                'color' => $this->album->cover->color
            ],
            'path' => $this->path,
        ];
    }
}
