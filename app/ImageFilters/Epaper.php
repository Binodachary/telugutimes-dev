<?php


namespace App\ImageFilters;


use Intervention\Image\Image;

class Epaper implements \Intervention\Image\Filters\FilterInterface
{

    public function applyFilter(Image $image): Image
    {
        return $image->resize(750, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('webp');
    }
}
