<?php

namespace App\Http\Resources;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        if ($this->parent_id > 0):
            $newsItems = News::whereJsonContains("category_json", $this->id)->take(5)->get();
        else:
            $newsItems = News::where(function ($q) { $q->whereJsonContains('category_json', $this->id);
                if(count($this->children) > 0) {
                    foreach ($this->children as $cat) {
                        $q->orWhereJsonContains('category_json', $cat->id);
                    };
                }
            })->take(5)->get();
        endif;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => $this->image ? asset("images/small/categories/$this->image") : null,
            'children' => $this->when($this->parent_id < 1, CategoryResource::collection($this->children)),
            'articles' => $this->when((request()->routeIs('dashboardApi') && $this->parent_id < 1),NewsResource::collection($newsItems))
        ];
    }

    public function with($request)
    {
        return [
            'status' => "success",
        ];
    }
}
