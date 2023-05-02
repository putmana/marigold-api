<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumTracksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'albumTracks',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'category' => $this->category,
                'year' => $this->release_year,
                'cover' => [
                    'path' => $this->cover->path,
                    'color' => $this->cover->color
                ],
            ],
            'relationships' => [
                'artists' => ArtistResource::collection($this->artists),
                'tracks' => TrackResource::collection($this->tracks)
            ]
        ];
    }
}
