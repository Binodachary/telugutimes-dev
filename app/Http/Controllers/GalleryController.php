<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    use GalleryReuse;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $galleries = Gallery::paginate(20)->onEachSide(0);
        $categories = $this->subs();
        $associations = Association::get('name')->pluck('name');
        if (!empty(request('selection')) || !empty(request('search'))) {
            $galleries = $this->search(request('selection'), request('search'));
        }
        return view("admin.gallery.index", compact('galleries', 'categories', 'associations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->subs();
        $associations = Association::get('name')->pluck('name');
        $gallery = new Gallery();
        return view("admin.gallery.form", compact('categories'))->with(compact('gallery'))->with(compact('associations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $gallery = new Gallery();
        $this->saveGallery($request, $gallery);
        return redirect()->route('admin.gallery.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function edit(Gallery $gallery)
    {
        $categories = $this->subs();
        $associations = Association::get('name')->pluck('name');
        return view("admin.gallery.form", compact('categories'))->with(compact('gallery'))->with(compact('associations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Gallery $gallery
     * @return Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->saveGallery($request, $gallery);
        return redirect()->route('admin.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function destroy(Gallery $gallery)
    {
        Storage::deleteDirectory("public/{$gallery->gallery_path}");
        $gallery->delete();
        return redirect()->back();
    }

    private function saveGallery(Request $request, Gallery $gallery)
    {
        if ($gallery->id) {
            $validation_rules = [
                'images.*' => 'sometimes|image',
            ];
        } else {
            $validation_rules = [
                'images' => 'required',
                'images.*' => 'image',
            ];
        }
        $subs = $this->subs($request->category);
        $common = [
            'category' => 'required',
            'sub_category' => Rule::requiredIf(!empty($subs)),
            'name' => 'required'
        ];
        $request->validate($validation_rules + $common);
        $gallery->name = $request->name;
        $gallery->category = $request->category;
        $gallery->sub_category = $request->sub_category ?? null;
        $gallery->association = $request->association ?? null;
        if (empty($gallery->slug))
            $gallery->slug = Str::slug($gallery->name);

        $gallery->save();
        if (empty($gallery->gallery_path))
            $gallery->gallery_path = "gallery/{$gallery->category}/{$gallery->sub_category}/{$gallery->slug}";

        if ($request->hasFile('images')) {
            foreach ($request->images as $k => $image) {
                $n = $k + 1;
                $image->storeAs("public/{$gallery->gallery_path}/", "{$gallery->slug}-{$n}.{$image->extension()}");
            }
        }
        $gallery->save();
    }

    public function category($category)
    {
        $subs = $this->subs($category);
        if (!empty($subs)):
            foreach ($subs as $sub):
                $gallery[$sub] = Gallery::where('sub_category', $sub)->take(8)->get();
            endforeach;
        else:
            $gallery = Gallery::where('category', $category)->take(8)->get();
        endif;
        return view('gallery.category', [
            'gallery' => $gallery,
            'subs' => $subs,
            'category' => $category
        ]);
    }

    public function subCategory($category, $sub)
    {
        $subs = $this->subs($category);
        if (!in_array($sub, $subs)):
            if ($sub == 'all') {
                $gallery = Gallery::where('category', $category)->paginate(20)->onEachSide(0);
            } else {
                return redirect('home');
            }
        else:
            $gallery = Gallery::where('sub_category', $sub)->paginate(20)->onEachSide(0);
        endif;
        return view('gallery.sub-category', [
            'gallery' => $gallery,
            'sub' => ($sub == 'all') ? $category : $sub
        ]);
    }

    public function photos(Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }

    public function associations()
    {
        $associations = Association::all();
        return view('gallery.associations', compact('associations'));
    }

    public function association($association)
    {
        $association = Association::whereName($association)->first();
        $gallery = Gallery::where('association', $association->name)->paginate(20);
        return view('gallery.association', compact('association'))->with(compact('gallery'));
    }

    public function search($selection = null, $search = null)
    {
        $gallery = Gallery::select('*');
        if (!empty($selection['category']))
            $gallery->where('category', $selection['category']);
        if (!empty($selection['sub_category']))
            $gallery->where('sub_category', $selection['sub_category']);
        if (!empty($selection['association']))
            $gallery->where('association', $selection['association']);
        if (!empty($search))
            $gallery->where("name", "like", "%{$search}%");

        return $gallery->paginate(20)->onEachSide(0);
    }
}
