<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $ads = Advertisement::paginate(20)->onEachSide(0);
        return view('admin.ad.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $ad = new Advertisement();
        return view('admin.ad.form', compact('ad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $ad = new Advertisement();
        $this->saveAdvertisement($request, $ad);
        return redirect()->route('admin.ad.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Advertisement $ad
     * @return Response
     */
    public function edit(Advertisement $ad)
    {
        return view('admin.ad.form', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Advertisement $ad
     * @return Response
     */
    public function update(Request $request, Advertisement $ad)
    {
        $this->saveAdvertisement($request, $ad);
        return redirect()->route('admin.ad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Advertisement $ad
     * @return Response
     */
    public function destroy(Advertisement $ad)
    {
        Storage::delete("public/advertisements/{$ad->image}");
        $ad->delete();
        return redirect()->back();
    }

    private function saveAdvertisement(Request $request, Advertisement $ad)
    {
        $validation_rules = [
            'image' => !empty($ad->id) ? 'sometimes|image' : 'required|image',
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
        $request->validate($validation_rules);
        $ad->name = $request->name;
        $ad->sort_order = $request->sort_order;
        $ad->url = $request->url ?? "#";
        $ad->position = $request->position ?? null;
        $ad->start_date = !empty($request->start_date) ? sqlDate($request->start_date) : NULL;
        $ad->end_date = !empty($request->end_date) ? sqlDate($request->end_date) : NULL;
        if ($request->hasFile('image')) {
            if(!empty($ad->image)){
                Storage::delete("public/advertisements/".$ad->image);
            }
            $image = $request->image->store("public/advertisements/");
            $ad->image = basename($image);
        }
        $ad->save();
    }

    public function status(Advertisement $ad)
    {
        $ad->is_active = !$ad->is_active;
        $ad->save();
        return redirect()->back();
    }
}
