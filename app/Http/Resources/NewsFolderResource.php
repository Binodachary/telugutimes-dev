<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsFolderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'title_language' => $this->title_language,
            'image' => asset("images/medium/{$this->image}")
        ];
    }

    public function with($request)
    {
        return [
            'status' => "success",
        ];
    }
}
