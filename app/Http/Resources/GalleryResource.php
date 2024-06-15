<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $file = getFiles("public/{$this->gallery_path}", true);
        $image = basename($file);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'category' => $this->category,
            'sub_category' => $this->sub_category,
            'image' => asset("storage/{$this->gallery_path}/{$image}")
        ];
    }

    public function with($request)
    {
        $images = getFiles("public/{$this->gallery_path}");
        $images = array_map('basename', $images);
        $images = array_map(function ($image){ return asset("storage/{$this->gallery_path}/{$image}");},$images);
        return [
            'images' => $images,
            'status' => "success",
        ];
    }
}
