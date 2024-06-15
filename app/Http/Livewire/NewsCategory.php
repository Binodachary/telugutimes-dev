<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsCategory extends Component
{
    public $category;
    public $selected = '';
    use WithPagination;

    protected $queryString = [
        'selected' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    protected $listeners = ['setSelected' => 'setSelected'];

    public function mount(Category $category, $selected)
    {
        $this->category = $category;
        $this->selected = $selected;
    }

    public function setSelected($selectedCat)
    {
        $this->selected = ($selectedCat == 'All') ? '' : $selectedCat;
        $this->resetPage();
    }

    public function render()
    {
        if ($this->category->parent_id > 0):
            $newsItems = News::whereJsonContains("category_json", $this->category->id)->paginate(10);
        else:
            $cats = $this->category;
            if (!empty($this->selected)) {
                $selectedCategory = Category::whereSlug($this->selected)->first();
                $newsItems = News::whereJsonContains("category_json", $selectedCategory->id)->paginate(10);
            } else {
                $newsItems = News::where(function ($q) use ($cats) {
                    $q->whereJsonContains('category_json', $this->category->id);
                    foreach ($cats->children as $cat) {
                        $q->orWhereJsonContains('category_json', $cat->id);
                    };
                })->paginate(10);
            }
        endif;
        $tabs = $this->category->children;
        return view('livewire.news-category', compact('tabs', 'newsItems'));
    }
}
