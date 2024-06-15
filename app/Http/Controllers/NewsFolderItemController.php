<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\NewsFolder;
use App\Models\NewsFolderItem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsFolderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $news_folder
     * @return Application|Factory|View|Response
     */
    public function index(NewsFolder $news_folder)
    {
        $news_folder_items = NewsFolderItem::withoutGlobalScope('active')->whereJsonContains('news_folder_id', $news_folder->id)->paginate(20);
        return view("admin.news-folder-items.index", compact('news_folder_items', 'news_folder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param NewsFolder $news_folder
     * @return Application|Factory|View|Response
     */
    public function create(NewsFolder $news_folder)
    {
        $news_folder_item = new NewsFolderItem();
        $news_folders = NewsFolder::all();
        $galleries = Gallery::all();
        return view("admin.news-folder-items.form", compact('news_folder_item', 'news_folder','news_folders','galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(NewsFolder $news_folder,Request $request)
    {
        $news_folder_item = new NewsFolderItem();
        $this->saveNews($request,$news_folder_item);
        return redirect()->route('admin.news-folder.news-folder-items.index',$news_folder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param NewsFolderItem $newsFolderItem
     * @return Application|Factory|View|Response
     */
    public function edit(NewsFolder $news_folder,NewsFolderItem $news_folder_item)
    {
        $news_folders = NewsFolder::all();
        $galleries = Gallery::all();
        return view("admin.news-folder-items.form", compact('news_folder_item', 'news_folder','news_folders','galleries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param NewsFolderItem $newsFolderItem
     * @return RedirectResponse
     */
    public function update(Request $request,NewsFolder $news_folder, NewsFolderItem $news_folder_item)
    {
        $this->saveNews($request,$news_folder_item);
        return redirect()->route('admin.news-folder.news-folder-items.index',$news_folder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param NewsFolderItem $news_folder_item
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(NewsFolderItem $news_folder_item): RedirectResponse
    {
        $this->deleteNewsImage($news_folder_item);
        $news_folder_item->delete();
        return redirect()->back();
    }

    private function deleteNewsImage(NewsFolderItem $news_folder_item)
    {
        if ($news_folder_item->image != '')
            Storage::delete("public/news/{$news_folder_item->image}");
    }

    private function saveNews(Request $request, NewsFolderItem $news)
    {
        $request->validate(
            [
                'title' => 'required',
                'slug' => 'required',
                'video_id' => 'required_if:has_video,YES',
                'description' => 'required',
                'image' => !empty($news->id) ? 'sometimes|image' : 'required|image',
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
        $news->has_video = $request->has_video;
        $news->video_id = $request->video_id;
        $news->gallery_id = $request->gallery_id;
        $news->title_language = $request->title_language;
        $news->description = $request->description;
        $news->description2 = $request->description2;
        $news->description3 = $request->description3;
        $news->description4 = $request->description4;
        $news->description5 = $request->description5;
        $news->news_folder_id = json_encode($request->news_folder_id,JSON_NUMERIC_CHECK);
        $news->save();
        if ($request->hasFile('image')) {
            $this->deleteNewsImage($news);
            $request->image->storeAs('public/news/', "news_folder_item_{$news->id}.{$request->image->extension()}");
            $news->image = "news_folder_item_{$news->id}.{$request->image->extension()}";
            $news->save();
        }
    }
}
