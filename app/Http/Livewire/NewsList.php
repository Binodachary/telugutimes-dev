<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsList extends Component
{
    public $category;
    public $categoryID;
    use WithPagination;

    protected $queryString = ['category' => ['except' => ''], 'page' => ['except' => 1]];

    public function mount(Category $category)
    {
        $this->category = $category->slug;
        $this->categoryID = $category->id;
        $this->fill(request()->only('category', 'page'));
    }

    public function render()
    {
        $newsItems = News::whereJsonContains("category_json", $this->categoryID)->paginate(10)->onEachSide(0);
        return view('livewire.news-list', compact('newsItems'));
    }

    /*public function paginationView()
    {
        return view('vendor.pagination.tailwind');
    }*/
}
