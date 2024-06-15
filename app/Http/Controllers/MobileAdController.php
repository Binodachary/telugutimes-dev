<?php

namespace App\Http\Controllers;

use App\Models\MobileAd;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class MobileAdController extends Controller
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
        $mobileAds = MobileAd::paginate(20)->onEachSide(0);
        return view('admin.mobileAd.index', compact('mobileAds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $mobileAd = new MobileAd();
        return view('admin.mobileAd.form', compact('mobileAd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $mobileAd = new MobileAd();
        $this->saveAdvertisement($request, $mobileAd);
        return redirect()->route('admin.mobileAd.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MobileAd $mobileAd
     * @return Application|Factory|View|Response
     */
    public function edit(MobileAd $mobileAd)
    {
        return view('admin.mobileAd.form', compact('mobileAd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param MobileAd $mobileAd
     * @return RedirectResponse
     */
    public function update(Request $request, MobileAd $mobileAd): RedirectResponse
    {
        $this->saveAdvertisement($request, $mobileAd);
        return redirect()->route('admin.mobileAd.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MobileAd $mobileAd
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(MobileAd $mobileAd): RedirectResponse
    {
        Storage::delete("public/mobileAds/{$mobileAd->image}");
        $mobileAd->delete();
        return redirect()->back();
    }

    private function saveAdvertisement(Request $request, MobileAd $mobileAd)
    {
        $validation_rules = [
            'image' => !empty($mobileAd->id) ? 'sometimes|image' : 'required|image',
            'name' => 'required',
        ];
        $request->validate($validation_rules);
        $mobileAd->name = $request->name;
        $mobileAd->position = $request->position;
        $mobileAd->sort_order = $request->sort_order;
        $mobileAd->url = $request->url ?? "#";
        if ($request->hasFile('image')) {
            if(!empty($mobileAd->image)){
                Storage::delete("public/mobileAds/".$mobileAd->image);
            }
            $image = $request->image->store("public/mobileAds/");
            $mobileAd->image = basename($image);
        }
        $mobileAd->save();
    }

    public function status(MobileAd $mobileAd): RedirectResponse
    {
        $mobileAd->is_active = !$mobileAd->is_active;
        $mobileAd->save();
        return redirect()->back();
    }
}
