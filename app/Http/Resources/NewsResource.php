<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Category;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $json_categories = json_decode($this->category_json);
        $dbJson = !empty($json_categories) ? Category::whereIn('id',$json_categories)->get() : [];
        $categories = !empty($dbJson) && !(request()->routeIs('dashboardApi')) ? CategoryResource::collection($dbJson) : [];
        $descriptionArray = array_filter([$this->description, $this->description2, $this->description3, $this->description4, $this->description5]);
        $descriptions = [];
        $ads = [['content' =>'ca-app-pub-3422284713546733/3296760294','type'=>'ad'],['content' =>'ca-app-pub-3422284713546733/3471432141','type'=>'ad']];
        foreach ($descriptionArray as $k =>$description) {
            if($k%2 == 0){
                $descriptions[] = $ads[0];
            }else{
                $descriptions[] = $ads[1];
            }
            $descriptions[] = ['content' => "<div style='line-height: 24px;font-size: 16px;'>".$description."</div>", 'type' => 'paragraph'];
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'has_video' => $this->has_video,
            'image' => asset("images/medium/{$this->image}"),
            'video_id' => !empty($this->video_id) ? "https://www.youtube.com/embed/{$this->video_id}" : null,
            'video_thumbnail' => !empty($this->video_id) ? yThumb($this->video_id) : null,
            'gallery_id' => $this->gallery_id,
            'description' => $descriptions,
            'keywords' => $this->keywords,
            'title_language' => $this->title_language,
            'is_highlighted' => $this->is_highlighted,
            'category' => $this->category_json,
            'categories' => $categories,
            'created_at' => $this->created_at
        ];
    }

    public function with($request)
    {
        return [
            'status' => "success",
        ];
    }
}
