<?php

namespace App\Http\Controllers;

use App\Models\NewsFolder;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsFolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news_folders = NewsFolder::withoutGlobalScope('active')->paginate(20);
        return view("admin.news-folder.index", compact('news_folders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $news_folder = new NewsFolder();
        return view("admin.news-folder.form", compact('news_folder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $news_folder = new NewsFolder();
        $this->saveNewsFolder($request,$news_folder);
        return redirect()->route('admin.news-folder.index');
    }

    /**
     * Display the specified resource.
     *
     * @param NewsFolder $newsFolder
     * @return Response
     */
    public function show(NewsFolder $newsFolder)
    {
        $newsFolderItems = News::whereJsonContains("news_folder_id", $newsFolder->id)->paginate(20);
        return view('news-folder.show', compact('newsFolder'))->with(compact('newsFolderItems'));
    }

    public function showAll()
    {
        $newsFolders = NewsFolder::paginate(20)->onEachSide(0);
        return view('news-folder.index', compact('newsFolders'));
    }

    public function article(News $article)
    {
        return view('news-folder.article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param NewsFolder $news_folder
     * @return Response
     */
    public function edit(NewsFolder $news_folder)
    {
        return view("admin.news-folder.form", compact('news_folder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param NewsFolder $newsFolder
     * @return Response
     */
    public function update(Request $request, NewsFolder $news_folder)
    {
        $this->saveNewsFolder($request,$news_folder);
        return redirect()->route('admin.news-folder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param NewsFolder $newsFolder
     * @return Response
     */
    public function destroy(NewsFolder $news_folder)
    {
        Storage::delete('public/'.$news_folder->image);
        $news_folder->delete();
        return  redirect()->back();
    }

    private function saveNewsFolder(Request $request, NewsFolder $news_folder)
    {
        if ($news_folder->id) {
            $validation_rules = [
                'image' => 'sometimes|image',
            ];
        } else {
            $validation_rules = [
                'image' => 'required|image',
            ];
        }
        $common = [
            'name' => 'required',
            'slug' => 'required',
        ];
        $request->validate($validation_rules+$common);
        $news_folder->name = $request->name;
        $news_folder->title_language = $request->title_language;
        if ($news_folder->slug == '') {
            $news_folder->slug = Str::slug($request->slug);
        } else {
            if ($news_folder->slug != $request->slug) {
                $news_folder->slug = Str::slug($request->slug);
            }
        }
        if ($request->hasFile('image')) {
            $request->image->storeAs("public/news-folders/", "{$request->slug}.{$request->image->extension()}");
            $news_folder->image = "news-folders/{$request->slug}.{$request->image->extension()}";
        }
        $news_folder->save();
    }
}
