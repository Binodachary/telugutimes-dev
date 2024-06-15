<?php

namespace App\View\Components;

use App\Models\Advertisement;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderAds extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        $ads = Advertisement::whereIn('position',['logo-top-left','logo-top-right','logo-top-right-full'])->get();
        $ads = $ads->groupBy('position')->all();
        return view('components.header-ads',compact('ads'));
    }
}
