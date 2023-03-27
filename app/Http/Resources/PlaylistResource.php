<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistResource extends JsonResource
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
            'username' => $this->user->name,
            'description' => $this->description,
            'cover' => [
                'path' => $this->cover->path,
                'color' => $this->cover->color,
            ],
        ];
    }
}
