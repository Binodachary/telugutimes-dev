<?php

namespace App\Http\Controllers;

use App\Models\WelcomeNote;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class WelcomeNoteController extends Controller
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
        $notes = WelcomeNote::paginate(20);
        return view("admin.welcome.index", compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $welcome = new WelcomeNote();
        return view("admin.welcome.form",compact('welcome'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $welcome = new WelcomeNote();
        $this->saveWelcomeNote($request, $welcome);
        return redirect()->route('admin.welcome.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WelcomeNote $welcome
     * @return Application|Factory|View|Response
     */
    public function edit(WelcomeNote $welcome)
    {
        return view('admin.welcome.form', compact('welcome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param WelcomeNote $welcome
     * @return RedirectResponse
     */
    public function update(Request $request, WelcomeNote $welcome): RedirectResponse
    {
        $this->saveWelcomeNote($request, $welcome);
        return redirect()->route('admin.welcome.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param WelcomeNote $welcome
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(WelcomeNote $welcome): RedirectResponse
    {
        Storage::delete("public/welcomes/{$welcome->image}");
        $welcome->delete();
        return redirect()->back();
    }

    private function saveWelcomeNote(Request $request, WelcomeNote $welcome)
    {
        $request->validate(
            [
                'schedule_to' => 'required',
                'description' => 'required',
                'image' => 'sometimes|image'
            ]
        );
        $welcome->schedule_to = $request->schedule_to ?? NULL;
        $welcome->url = $request->url ?? '#';
        $welcome->description = $request->description;
        if ($request->hasFile('image')) {
            if (!empty($welcome->image)) {
                Storage::delete("public/welcomes/{$welcome->image}");
            }
            $image = $request->image->store("public/welcomes/");
            $welcome->image = basename($image);
        }
        $welcome->save();
    }

    public function status(WelcomeNote $welcome): RedirectResponse
    {
        $welcome->is_active = !$welcome->is_active;
        $welcome->save();
        return redirect()->back();
    }
}
