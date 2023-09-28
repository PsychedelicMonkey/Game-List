<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
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
            'slug' => $this->slug,
            'release_date' => $this->release_date,
            'description' => $this->description,
            'urls' => $this->urls,
            'images' => MediaResource::collection($this->whenLoaded('media')),
            'developer' => new DeveloperResource($this->whenLoaded('developer')),
            'genre' => new GenreResource($this->whenLoaded('genre')),
            'publisher' => new PublisherResource($this->whenLoaded('publisher')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
