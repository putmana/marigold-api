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
            'type' => 'track',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'duration' => $this->duration,
                'cover' => [
                    'path' => $this->album->cover->path,
                    'color' => $this->album->cover->color
                ],
                'path' => $this->path,
            ],
            'relationships' => [
                'artists' => ArtistResource::collection($this->artists)
            ]
            
        ];
    }
}
