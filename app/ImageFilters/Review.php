<?php


namespace App\ImageFilters;


use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Review implements FilterInterface
{
    public function applyFilter(Image $image): Image
    {
        return $image->fit(360, 250, function ($constraint) {
            $constraint->upsize();
        }, 'top')->encode('webp');
    }
}
