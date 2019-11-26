<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // just show the id, title, and article properties
        // $this represents the current article
        return [
        "id" => $this->id,
        "title" => $this->title,
        "pages" => $this->pages,
        "published" => $this->published,
        "rating" => $this->rating,
        "shops" => $this->shops,
        ];
    }
}
