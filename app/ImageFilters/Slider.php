<?php


namespace App\ImageFilters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Slider implements FilterInterface
{
    public function applyFilter(Image $image): Image
    {
        return $image->fit(750, 390, function ($constraint) {
            $constraint->upsize();
        }, 'top')->encode('webp');
    }
}
