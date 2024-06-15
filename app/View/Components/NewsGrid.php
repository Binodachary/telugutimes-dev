<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewsGrid extends Component
{
    public $heading;

    /**
     * Create a new component instance.
     *
     * @param $heading
     */
    public function __construct($heading)
    {

        $this->heading = $heading;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {

        return view('components.reuse.news-grid');
    }
}
