<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GalleryReuse;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\EPaperResource;
use App\Http\Resources\GalleryResource;
use App\Http\Resources\MobileAdResource;
use App\Http\Resources\NewsFolderResource;
use App\Http\Resources\NewsResource;
use App\Models\Category;
use App\Models\Epaper;
use App\Models\Gallery;
use App\Models\MobileAd;
use App\Models\News;
use App\Models\NewsFolder;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use GalleryReuse;

    public function categories(Category $category = null)
    {
        if ($category) {
            return new CategoryResource($category);
        }
        $mainCategories = [
            'politics', 'interviews', 'cinemas', 'community', 'business', 'corona', 'articles', 'events',
            'usa-nri-news', 'cinema-reviews', 'cinema','religious'
        ];
        return CategoryResource::collection(Category::whereIn('slug', $mainCategories)->get())->additional([
            'status' => "success",
        ]);
    }

    public function categoryNews(Category $category)
    {
        if ($category->parent_id > 0):
            $newsItems = News::whereJsonContains("category_json", $category->id)->paginate(20);
        else:
            $newsItems = News::where(function ($q) use ($category) {
                $q->whereJsonContains('category_json', $category->id);
                foreach ($category->children as $cat) {
                    $q->orWhereJsonContains('category_json', $cat->id);
                };
            })->paginate(20);
        endif;
        return NewsResource::collection($newsItems)->additional(['status' => "success"]);
    }

    public function getArticle(News $news)
    {
        $categories = json_decode($news->category_json);
        $related = News::where('id', '!=', $news->id)->where(function ($q) use ($categories) {
            foreach ($categories as $category) {
                $q->orWhereJsonContains('category_json', $category);
            }
        })->take(10)->get();
        $data = [];
        $data['article'] = new NewsResource($news);
        $data['related_articles'] = NewsResource::collection($related);
        $result = ['status' => "success", 'data' => $data];
        return $result;
    }

    public function newsFolders(NewsFolder $newsFolder = null)
    {
        if ($newsFolder) {
            return NewsResource::collection(News::whereJsonContains('news_folder_id',
                $newsFolder->id)->paginate(20))->additional(
                ['status' => "success", 'folder' => new NewsFolderResource($newsFolder)]
            );
        }
        return NewsFolderResource::collection(NewsFolder::paginate(20))->additional(['status' => 'success']);
    }

    public function highlightNews()
    {
        return NewsResource::collection(News::where('is_highlighted',
            true)->take(10)->get())->additional(['status' => "success"]);
    }

    public function article(News $news)
    {
        return new NewsResource($news);
    }

    public function epapers(Epaper $epaper = null)
    {
        if ($epaper) {
            return new EPaperResource($epaper);
        }
        return EPaperResource::collection(Epaper::paginate(20))->additional(['status' => 'success']);
    }

    public function epaper()
    {
        return new EPaperResource(Epaper::first());
    }

    public function galleryCategories()
    {
        return [
            'data' => [
                ['slug' => 'america', 'name' => 'America', 'children' => $this->subs('america', true)],
                ['slug' => 'cinema', 'name' => 'Cinema', 'children' => $this->subs('cinema', true)],
                ['slug' => 'political', 'name' => 'Political', 'children' => $this->subs('political', true)],
            ],
            'status' => 'success'
        ];
    }

    public function galleryCategory($category)
    {
        $subs = $this->subs($category);
        return ['data' => !empty($subs) ? ['categories' => $subs] : [], 'status' => 'success'];
    }

    public function gallerySub($category, $sub)
    {
        $subs = $this->subs($category);
        if (!in_array($sub, $subs) && $sub = 'all'):
            $gallery = Gallery::where('category', $category)->paginate(20)->onEachSide(0);
        else:
            $gallery = Gallery::where('sub_category', $sub)->paginate(20)->onEachSide(0);
        endif;
        return GalleryResource::collection($gallery)->additional(['status' => 'success']);
    }

    public function gallery(Gallery $gallery)
    {
        return new GalleryResource($gallery);
    }

    public function advertisements()
    {
        return MobileAdResource::collection(MobileAd::all())->additional(['status' => 'success']);
    }

    public function dashboard()
    {
        $data = [];
        $mainCategories = ['politics', 'cinemas', 'community','religious'];
        $data['banners'] = NewsResource::collection(News::where('is_highlighted', true)->take(10)->get());
        $data['advertisements'] = MobileAdResource::collection(MobileAd::all());
        $data['categories'] = CategoryResource::collection(Category::whereIn('slug',$mainCategories)->get());
        $result = ['status' => "success", 'data' => $data];
        return $result;
    }
}
