<?php

namespace App\View\Components;

use App\Models\Advertisement;
use Illuminate\View\Component;

class MainLayout extends Component
{
//    public $title = null;

    /**
     * Create a new component instance.
     *
     */
    public function __construct()
    {
//        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     */
    public function render()
    {
        $ads = Advertisement::where('position', 'menu-below')->get();
        $ads = $ads->groupBy('position')->all();
        return view('layouts.main',compact('ads'));
    }
}
