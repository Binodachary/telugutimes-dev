<?php

namespace App\View\Components;

use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HighlightNews extends Component
{
    /**
     * @var mixed|null
     */
    public $language;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($language = null)
    {
        $this->language = $language;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        $filter_lang = (!empty($this->language) && $this->language === 'eng') ? "YES" : "NO";
        $highlights = News::highlighted()->where('has_english', $filter_lang)->take(10)->get();
        return view('components.site.highlight-news', compact('highlights'));
    }
}
