<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('category');
    }
    public function category(Category $category)
    {
        if($category->parent_id > 0):
            $newsItems = News::whereJsonContains("category_json",$category->id)->paginate(10);
        else:
            $newsItems = News::where(function ($q) use ($category) {
                $q->whereJsonContains('category_json', $category->id);
                foreach ($category->children as $cat) {
                    $q->orWhereJsonContains('category_json', $cat->id);
                };
            })->paginate(10);
        endif;
        $tabs = $category->children;
        return view('categoryNews', compact('newsItems'))->with(['category' => $category, 'tabs' => $tabs]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $categories = Category::paginate(20)->onEachSide(0);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $category = new Category();
        $categories = Category::all();
        return view('admin.category.form', compact('category','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $this->saveCategory($request, $category);
        return redirect()->route('admin.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.category.form', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $this->saveCategory($request, $category);
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        Storage::delete("public/categories/{$category->image}");
        $category->delete();
        return redirect()->back();
    }

    private function saveCategory(Request $request, Category $category)
    {
        $validation_rules = [
            'image' => 'sometimes|image',
            'title' => 'required',
            'name' => 'required',
            'slug' => !empty($category->id) ? "required|unique:categories,slug,{$category->id}" : 'required|unique:categories'
        ];
        $request->validate($validation_rules);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id ?? 0;
        $category->keywords = $request->keywords;
        if ($request->hasFile('image')) {
            if(!empty($category->image)){
                Storage::delete("public/categories/".$category->image);
            }
            $image = $request->image->store("public/categories/");
            $category->image = basename($image);
        }
        $category->save();
    }

    public function status(Category $category)
    {
        $category->is_active = !$category->is_active;
        $category->save();
        return redirect()->back();
    }
}
