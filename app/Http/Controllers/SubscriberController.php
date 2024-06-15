<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $subscribers = Subscriber::paginate(20);
        return view('admin.subscribers.index',compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return false|Response|string
     */
    public function store(Request $request)
    {
        if (!Subscriber::whereEmail($request->email)->exists()) {
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->save();
            return json_encode(['status' => 'success', 'message' => 'You are successfully subscribed to the Epaper..!']);
        }else{
            return json_encode(['status' => 'warning', 'message' => 'You are already subscribed to the Epaper..!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Subscriber $subscriber
     * @return Response
     */
    public
    function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subscriber $subscriber
     * @return Response
     */
    public
    function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Subscriber $subscriber
     * @return Response
     */
    public
    function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subscriber $subscriber
     * @return RedirectResponse
     * @throws Exception
     */
    public
    function destroy(Subscriber $subscriber): RedirectResponse
    {
        $subscriber->delete();
        return back();
    }
}
