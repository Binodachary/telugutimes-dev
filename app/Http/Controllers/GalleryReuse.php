<?php


namespace App\Http\Controllers;


use App\Models\Gallery;

trait GalleryReuse
{
    public function subs($category = null,$convert=false)
    {
        $data = Gallery::withoutGlobalScope("active")
            ->withoutGlobalScope("fresh")
            ->groupBy('sub_category', 'category')
            ->get(['category', 'sub_category'])
            ->mapToGroups(function ($item, $key) {
                return [$item['category'] => $item['sub_category']];
            });
        if (!empty($category)) {
            if ($data[$category]) {
                if($convert)
                    return $this->structureSubCategories($data[$category]->filter()->all());
                else
                    return $data[$category]->filter()->all();
            } else {
                return redirect()->route('home');
            }
        } else {
            return $data;
        }
    }

    public function structureSubCategories($items)
    {
        if(!empty($items)){
            return array_map(function ($item){
                return ['name' => un_slug($item),'slug' => $item];
            },$items);
        }
        return [];
    }
}