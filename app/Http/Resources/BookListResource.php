<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // just the id and title properties
        return [
        "id" => $this->id,
        "title" => $this->title,
        "published" => $this->published,
        "author id" => $this->author_id,
        "shops" => $this->shops->pluck("name"),
        ];
    }
}
