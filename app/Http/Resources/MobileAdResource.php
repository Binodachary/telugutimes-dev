<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MobileAdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'position' => (int) $this->position,
            'sort_order' => (int) $this->sort_order,
            'image' => asset("storage/mobileAds/{$this->image}"),
        ];
    }

    public function with($request): array
    {
        return [
            'status' => "success",
        ];
    }
}
