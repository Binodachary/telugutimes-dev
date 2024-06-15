<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Gallery;
use App\Models\News;
use App\Models\NewsFolder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $newsCount = News::all()->count();
        $galleryCount = Gallery::all()->count();
        $associationCount = Association::all()->count();
        $newsFolderCount = NewsFolder::all()->count();
        $todayNewsCount = News::whereDate('created_at',Carbon::today())->get()->count();
        $todayGalleryCount = Gallery::whereDate('created_at',Carbon::today())->get()->count();
        $todayAssociationCount = Association::whereDate('created_at',Carbon::today())->get()->count();
        $todayNewsFolderCount = NewsFolder::whereDate('created_at',Carbon::today())->get()->count();
        return view('admin.index',compact('newsCount','galleryCount','associationCount','newsFolderCount','todayNewsCount','todayGalleryCount','todayAssociationCount','todayNewsFolderCount'));
    }

    public function profile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'mobile' => 'required|digits:10|unique:users,mobile,'.auth()->id(),
            'password' => 'sometimes|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]);
        if(!empty($request->password)){
            $user->password = $request->password;
            $user->save();
        }
        return redirect()->route("profile")->withInput(['message' => 'Your Profile Updated successfully..!']);
    }

    public function profileView()
    {
        return view('admin.profile');
    }
}
