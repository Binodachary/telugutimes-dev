<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $associations = Association::orderBy('name')->paginate(20);
        return view('admin.association.index', compact('associations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $association = new Association();
        return view('admin.association.form', compact('association'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $association = new Association();
        $this->saveAssociation($request,$association);
        return redirect()->route('admin.association.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Association $association
     * @return Application|Factory|View|Response
     */
    public function edit(Association $association)
    {
        return view('admin.association.form', compact('association'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Association $association
     * @return Response
     */
    public function update(Request $request, Association $association)
    {
        $this->saveAssociation($request,$association);
        return redirect()->route('admin.association.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Association $association
     * @return Response
     */
    public function destroy(Association $association)
    {
        Storage::deleteDirectory("public/gallery/association-logos/{$association->name}");
        $association->delete();
        return redirect()->back();
    }

    public function saveAssociation(Request $request, Association $association)
    {
        $request->validate(['name' => 'required', 'logo' => $association->id ? 'sometimes|image' : 'required|image']);
        $association->name = $request->name;
        $association->site_url = $request->site_url;
        $association->slug = \Str::slug($request->name);
        if ($request->hasFile('logo')) {
            $request->logo->storeAs("public/gallery/association-logos/{$association->name}/", "{$association->slug}.{$request->logo->extension()}");
            $association->logo = "{$association->slug}.{$request->logo->extension()}";
        }
        $association->save();
    }
}
