<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $videos = Video::withoutGlobalScope("active")->paginate(20);
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $video = new Video();
        return view('admin.videos.form', compact('video'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $video = new Video();
        $this->saveVideo($request, $video);
        return redirect()->route('admin.videos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Video $video
     * @return Application|Factory|View|Response
     */
    public function edit(Video $video)
    {
        return view('admin.videos.form', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Video $video
     * @return RedirectResponse
     */
    public function update(Request $request, Video $video): RedirectResponse
    {
        $this->saveVideo($request, $video);
        return redirect()->route('admin.videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Video $video
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Video $video): RedirectResponse
    {
        $video->delete();
        return redirect()->back();
    }

    private function saveVideo(Request $request, Video $video)
    {
        $request->validate(
            [
                'title' => 'required',
                'video_id' => 'required',
            ]
        );
        $video->title = $request->title;
        if ($video->title == '') {
            $video->created_by = auth()->id();
        }else{
            $video->updated_by = auth()->id();
        }
        $video->video_id = $request->video_id;
        $video->category = $request->category;
        $video->title_language = $request->title_language;
        $video->save();
    }

    public function show($category = null)
    {
        $videos = Video::where('category',$category ?? 'cinema')->paginate(21)->onEachSide(0);
        $headings = ['cinema'=>'Cinema','nri'=>'NRI'];
        $heading = !empty($category) ? $headings[$category] : 'Cinema';
        return view('videos')->with(compact('videos','heading'));
    }
}
