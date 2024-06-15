<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\News;
use App\Models\NewsFolder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('archives', 'archived');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $news = News::paginate(20);
        $categories = Category::all();
        if (!empty(request('category')) || !empty(request('search'))) {
            $news = $this->search(request('category'), request('search'));
        }
        return view('admin.news.index', compact('news','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $categories = Category::where("is_active", true)->where("parent_id", 0)->get();
        $news_folders = NewsFolder::all();
        $galleries = Gallery::all();
        $news = new News();
        return view('admin.news.form', compact('news','news_folders','galleries','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $news = new News();
        $this->saveNews($request, $news);
        return redirect()->route('admin.news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View|Response
     */
    public function edit(News $news)
    {
//        return $news;
        $categories = Category::where("is_active", true)->where("parent_id", 0)->get();
        $news_folders = NewsFolder::all();
        $galleries = Gallery::all();
        return view('admin.news.form', compact('news','news_folders','galleries','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return Response
     */
    public function update(Request $request, News $news)
    {
        $this->saveNews($request, $news);
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(News $news)
    {
        $this->deleteNewsImage($news);
        $news->delete();
        return redirect()->back();
    }

    private function saveNews(Request $request, News $news)
    {
        $request->validate(
            [
                'title' => 'required',
                'slug' => 'required',
                'video_id' => 'required_if:has_video,YES',
                'description' => 'required',
                'image' => 'sometimes|image',
                'category' => 'required|array|min:1'
            ]
        );
        $news->title = $request->title;
        if ($news->slug == '') {
            $news->slug = Str::slug($request->slug);
            $news->posted_by = auth()->id();
        } else {
            if ($news->slug != $request->slug) {
                $news->slug = Str::slug($request->slug);
            }
            $news->updated_by = auth()->id();
        }
        $news->has_video = !empty($request->video_id) ? "YES" : "NO";
        $news->video_id = $request->video_id ?? null;
        $news->is_highlighted = $request->is_highlighted;
        $news->has_english = $request->has_english;
        $news->title_language = $request->title_language;
        $news->schedule_to = $request->schedule_to ?? NULL;
        $news->description = $request->description;
        $news->description2 = $request->description2;
        $news->description3 = $request->description3;
        $news->description4 = $request->description4;
        $news->description5 = $request->description5;
        $news->category = implode(',', $request->category);
        $news->keywords = $request->keywords;
        $news->category_json = json_encode($request->category, JSON_NUMERIC_CHECK);
        $news->news_folder_id = !empty($request->news_folder_id) ? json_encode($request->news_folder_id, JSON_NUMERIC_CHECK) : NULL;
        $news->gallery_id = !empty($request->news_folder_id) ? ($request->gallery_id ?? 0) : 0;
        $news->save();
        if ($request->hasFile('image')) {
            $this->deleteNewsImage($news);
            $request->image->storeAs('public/news/', "news_new_{$news->id}.{$request->image->extension()}");
            $news->image = "news_new_{$news->id}.{$request->image->extension()}";
            $news->save();
        }
    }

    private function deleteNewsImage(News $news)
    {
        if ($news->image != '')
            Storage::delete("public/news/{$news->image}");
    }

    public function archives($year = null)
    {
        $folders = \DB::table('news')->select(\DB::raw("YEAR(created_at) as archive_year"))->where("archived", true)->groupBy(\DB::raw("YEAR(created_at)"))->get()->pluck("archive_year");
        if ($year) {
            $newsItems = \DB::table('news')->where("archived", true)->where(\DB::raw("YEAR(created_at)"), $year)->orderBy("id", "desc")->paginate(10);
            $page = ['heading' => "Archived articles " . $year];
            return view('archiveNews', compact('newsItems'))->with(compact('page'));
        }
        return view("archives", compact('folders'));
    }

    public function search($categoryID = null, $search = null)
    {
        $news = News::select('*');
        if (!empty($categoryID)) {
            $categoryID = (integer) $categoryID;
            $categoriesObject = Category::find($categoryID);
            if ($categoriesObject->children->count() > 0) {
                $current = $categoriesObject->children()->pluck('id');
                $news->where(function ($q) use ($categoryID, $current) {
                    $q->whereJsonContains('category_json', $categoryID);
                    foreach ($current as $cat) {
                        $q->orWhereJsonContains('category_json', $cat);
                    };
                });
            } else
                $news->whereJsonContains('category_json', $categoryID);
        }
        if (!empty($search)) {
            $news->where("title", "like", "%{$search}%");
        }
        return $news->paginate(20);
    }

    public function status(News $news)
    {
        $news->is_active = !$news->is_active;
        $news->save();
        return redirect()->back();
    }
    public function archived(News $news)
    {
        return view("article", ['news' => $news]);
    }
}
