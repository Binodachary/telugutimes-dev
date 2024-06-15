<?php

namespace App\Http\Controllers;

use App\Models\Epaper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $epapers = Epaper::withoutGlobalScope("active")->paginate(20)->onEachSide(0);
        return view('admin.epaper.index', compact('epapers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $epaper = new Epaper();
        return view('admin.epaper.form', compact('epaper'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $epaper = new Epaper();
        $this->saveEpaper($request, $epaper);
        return redirect()->route('admin.epaper.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Epaper $epaper
     * @return Response
     */
    public function edit(Epaper $epaper)
    {
        return view('admin.epaper.form', compact('epaper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Epaper $epaper
     * @return Response
     */
    public function update(Request $request, Epaper $epaper)
    {
        $this->saveEpaper($request, $epaper);
        return redirect()->route('admin.epaper.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Epaper $epaper
     * @return Response
     */
    public function destroy(Epaper $epaper)
    {
        Storage::deleteDirectory("public/{$epaper->folder}");
        $epaper->delete();
        return redirect()->back();
    }

    private function saveEpaper(Request $request, Epaper $epaper)
    {
        if ($epaper->id) {
            $validation_rules = [
                'images.*' => 'sometimes|image',
            ];
        }else{
            $validation_rules = [
                'images' => 'required',
                'images.*' => 'image',
            ];
        }
        $request->validate($validation_rules);
        $epaper->name = $request->name;
        $epaper->edition_year = $request->edition_year;
        $epaper->edition_month = $request->edition_month;
        if (empty($epaper->slug)) {
            $epaper->slug = Str::slug(implode("-", [$epaper->edition_year, $epaper->edition_month, $epaper->name]));
        }
        if(empty($epaper->folder)) {
            $epaper->folder = 'epapers/';
            $epaper->folder .= $epaper->slug;
        }
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $image->storeAs("public/{$epaper->folder}/",$image->getClientOriginalName());
            }
        }
        $epaper->save();
    }

    /**
     * Display the specified resource.
     *
     * @param Epaper|null $epaper
     * @return Application|Factory|View|Response
     */
    public function show(Epaper $epaper = null)
    {
        if (empty($epaper))
            $epaper = Epaper::first();
        $images = getFiles("public/{$epaper->folder}");
        $images = array_map('basename', $images);
        usort($images, function ($a, $b) {
            return (int)pathinfo($a, PATHINFO_FILENAME) <=> (int)pathinfo($b, PATHINFO_FILENAME);
        });
        return view('epaper.show', compact('epaper'))->with(compact('images'));
    }

    public function show2(Epaper $epaper = null)
    {
        if (empty($epaper))
            $epaper = Epaper::first();
        $images = getFiles("public/{$epaper->folder}");
        $images = array_map('basename', $images);
        usort($images, function ($a, $b) {
            return (int)pathinfo($a, PATHINFO_FILENAME) <=> (int)pathinfo($b, PATHINFO_FILENAME);
        });
        $lastItem = array_pop($images);
        array_unshift($images, $lastItem);
        return view('epaper.show2', compact('epaper'))->with(compact('images'));
    }
    public function showAll()
    {
        $epapers = Epaper::paginate(20)->onEachSide(0);
        return view('epaper.index', compact('epapers'));
    }
}
