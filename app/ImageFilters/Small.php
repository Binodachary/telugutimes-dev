<?php


namespace App\ImageFilters;


use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Small implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(120, 90,function ($constraint) {
            $constraint->upsize();
        }, 'top')->encode('webp');
    }
}
