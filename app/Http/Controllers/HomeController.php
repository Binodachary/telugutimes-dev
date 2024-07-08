<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Association;
use App\Models\Category;
use App\Models\Epaper;
use App\Models\Gallery;
use App\Models\News;
use App\Models\NewsFolder;
use App\Models\NewsFolderItem;
use App\Models\Video;
use App\Models\WelcomeNote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home($language = null)
    {
        $news_categories =[];
        $categories = ['politics' => 'Political', 'cinemas' => 'Cinema', 'community' => 'Community'];
        [$tabs, $news] = $this->homeTabData($categories, $language);

        $welcomeNote = WelcomeNote::first();
        $sidebarNews = $this->sidebarNews($language);
        $associations = Association::all();
        $epapers = Epaper::take(5)->get();
        $community_gallery = Gallery::where('category', 'america')->take(5)->get();
        $cinema_gallery = Gallery::where('category', 'cinema')->take(5)->get();
        $ads = Advertisement::whereNotIn('position', ['logo-top-left', 'logo-top-right'])->get();
        $ads = $ads->groupBy('position')->all();
        $videos = Video::take(6)->get();
        $filter_lang = (!empty($this->language) && $this->language === 'eng') ? "YES" : "NO";
        $highlights = News::highlighted()->where('has_english', $filter_lang)->take(10)->get();
         $communityCategory = Category::where('slug', 'community')->first();
         $news_details = News::where(function ($query) use ($communityCategory) {
            $query->whereJsonContains('category_json', $communityCategory->id)
                ->orwhereJsonContains('category_json', $communityCategory->children->pluck('id'));
        })->where('has_english', $filter_lang)->take(7)->get();;
       $uri_news= News::whereJsonContains('category_json', $communityCategory->children->pluck('id'))->where('has_english', 'YES')->take(7)->get();
//print_r($uri_news);die;
    // Output the formatted SQL
   // echo "SQL Query: $formattedSql";
       // print_r($news_details);die;
        return view("home",
            compact('categories', 'tabs', 'news', 'sidebarNews', 'associations', 'epapers', 'cinema_gallery',
                'community_gallery', 'ads', 'videos', 'welcomeNote', 'language','highlights','news_details','uri_news'));
    }
    public function fetchNewsByCategory($categoryId)
{
    $newsItems = News::whereJsonContains('category_json', $categoryId)->take(27)->get();

    return response()->json($newsItems);
}
    public function article(News $news)
    {
        return view("article", ['news' => $news]);
    }

    public function advertise()
    {
        return view("advertise");
    }

    public function contact()
    {
        return view("contact");
    }

    public function about()
    {
        return view("about");
    }

    public function poulomi()
    {
        return view("poulomi");
    }

    public function aprgroup()
    {
        return view("aprgroup");
    }

    public function sriaditya()
    {
        return view("sriaditya");
    }

    public function tripura()
    {
        return view("tripura");
    }

    public function devansh()
    {
        return view("devansh");
    }

    public function privacy()
    {
        return view("privacy");
    }

    public function terms()
    {
        return view("terms");
    }

    public function copyrights()
    {
        return view("copyrights");
    }

    /**
     * @param  array  $categories
     * @param  array  $tabs
     * @param  array  $news_categories
     * @param  array  $news
     * @return array[]
     */
    private function homeTabData(array $categories, $language = null): array
    {
        $filter_lang = (!empty($language) && $language === 'eng') ? "YES" : "NO";
        $tabs = $news_categories = $news = [];
        $categoriesObject = Category::with('children')->whereIn('slug', array_keys($categories))->get();
        foreach ($categoriesObject as $category):
            $key = $category->slug;
            $tabs[$key] = $category->children;
            $news_categories[$key] = $current = $category->children()->pluck('id');
            $news[$key] = News::where(function ($q) use ($category, $current) {
                $q->whereJsonContains('category_json', $category->id);
                foreach ($current as $cat) {
                    $q->orWhereJsonContains('category_json', $cat);
                };
            })->where('has_english', $filter_lang)->take(27)->get();
        endforeach;
        return [$tabs, $news];
    }

    /**
     * @return array
     */
    private function sidebarNews($language = null): array
    {
        $filter_lang = (!empty($language) && $language === 'eng') ? "YES" : "NO";
        $sidebarCategories = ['cinema-reviews', 'events', 'cinema-interviews', 'political-articles', 'nri-videos'];
        $sidebarCategories = Category::whereIn('slug', $sidebarCategories)->get();
        foreach ($sidebarCategories as $sidebarCategory):
            $sidebarNews[$sidebarCategory->slug] = News::whereJsonContains("category_json",
                $sidebarCategory->id)->where('has_english', $filter_lang)->take(5)->get();
        endforeach;
        return $sidebarNews;
    }

    public function home1()
    {
        $categories = ['politics' => 'Political', 'cinemas' => 'Cinema', 'community' => 'Community'];
        [$tabs, $news] = $this->homeTabData($categories);
        $welcomeNote = WelcomeNote::first();
        $sidebarNews = $this->sidebarNews();
        $associations = Association::all();
        $news_folders = NewsFolder::take(5)->get();
        $epapers = Epaper::take(5)->get();
        $community_gallery = Gallery::where('category', 'america')->take(5)->get();
        $ads = Advertisement::whereNotIn('position', ['logo-top-left', 'logo-top-right'])->get();
        $ads = $ads->groupBy('position')->all();
        $videos = Video::take(6)->get();
        $header_partial = "header1";
        $politics = Political::take(5)->get();
        $cinemas = Cinema::take(5)->get();
        $community = Community::take(5)->get();

        return view("home",
            compact('categories','tabs','news',  'sidebarNews', 'associations', 'news_folders', 'epapers',
                'community_gallery', 'ads', 'videos', 'welcomeNote', 'header_partial'));
    }
    public function home3()
    {
        $categories = ['politics' => 'Political', 'cinemas' => 'Cinema', 'community' => 'Community'];
        [$tabs, $news] = $this->homeTabData($categories);
        $welcomeNote = WelcomeNote::first();
        $sidebarNews = $this->sidebarNews();
        $associations = Association::all();
        $news_folders = NewsFolder::take(5)->get();
        $epapers = Epaper::take(5)->get();
        $community_gallery = Gallery::where('category', 'america')->take(5)->get();
        $ads = Advertisement::whereNotIn('position', ['logo-top-left', 'logo-top-right'])->get();
        $ads = $ads->groupBy('position')->all();
        $videos = Video::take(6)->get();
        $header_partial = "header1";
        return view("home",
            compact('categories', 'tabs', 'news', 'sidebarNews', 'associations', 'news_folders', 'epapers',
                'community_gallery', 'ads', 'videos', 'welcomeNote', 'header_partial'));
    }
    public function home2()
    {
        $categories = ['politics' => 'Political', 'cinemas' => 'Cinema', 'community' => 'Community'];
        [$tabs, $news] = $this->homeTabData($categories);
        $welcomeNote = WelcomeNote::first();
        $sidebarNews = $this->sidebarNews();
        $associations = Association::all();
        $news_folders = NewsFolder::take(5)->get();
        $epapers = Epaper::take(5)->get();
        $community_gallery = Gallery::where('category', 'america')->take(5)->get();
        $ads = Advertisement::whereNotIn('position', ['logo-top-left', 'logo-top-right'])->get();
        $ads = $ads->groupBy('position')->all();
        $videos = Video::take(6)->get();
        $header_partial = "header2";
        return view("home",
            compact('categories', 'tabs', 'news', 'sidebarNews', 'associations', 'news_folders', 'epapers',
                'community_gallery', 'ads', 'videos', 'welcomeNote', 'header_partial'));
    }
}
