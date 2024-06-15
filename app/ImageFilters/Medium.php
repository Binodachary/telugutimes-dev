<?php


namespace App\ImageFilters;


use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Medium implements FilterInterface
{
    public function applyFilter(Image $image): Image
    {
        return $image->fit(240, 180, function ($constraint) {
            $constraint->upsize();
        }, 'top')->encode('webp');
    }
}
