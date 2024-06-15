<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarNews extends Component
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
        $highlights = News::highlighted()->take(10)->get();
        $cinemaNewsCategory = Category::where('slug', 'cinema-news')->first();
        $cinemaNews = News::whereJsonContains("category_json", $cinemaNewsCategory->id)->whereNotIn('id',$highlights->pluck('id'))->take(10)->get();
        return view('components.site.sidebar-news', ['highlights' => $highlights, 'cinemaNews' => $cinemaNews]);
    }
}
