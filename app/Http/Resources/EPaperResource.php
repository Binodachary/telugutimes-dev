<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EPaperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'edition' => trim("{$this->edition_year} {$this->edition_month} {$this->name}"),
            'slug' => $this->slug,
            'image' => asset("images/medium/{$this->folder}/1.jpg")
        ];
    }

    public function with($request)
    {
        $images = getFiles("public/{$this->folder}");
        $images = array_map('basename', $images);
        usort($images, function ($a, $b) {
            return (int)pathinfo($a, PATHINFO_FILENAME) <=> (int)pathinfo($b, PATHINFO_FILENAME);
        });
        $images = array_map(function ($image){ return asset("images/epaper/{$this->folder}/{$image}");},$images);
        return [
            'images' => $images,
            'status' => "success",
        ];
    }
}
