<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;

class FetchPosts extends Component
{
    public $category;

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $newsItems = News::whereJsonContains("category_json", $this->category->id)->take(27)->get();
        return view('livewire.fetch-posts', compact('newsItems'))->with(['category' => $this->category]);
    }
}
