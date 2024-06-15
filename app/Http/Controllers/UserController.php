<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
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
        $roles = ['EMPLOYEE' => 'Employee', 'SEO_MANAGER' => 'SEO Manager', 'ADMIN' => 'Admin'];
        $users = User::where('role', '!=', 'ADMIN')->paginate(20);
        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $user = new User();
        $roles = ['EMPLOYEE' => 'Employee', 'SEO_MANAGER' => 'SEO Manager'];
        return view('admin.users.form', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $user = new User();
        $this->saveUser($request, $user);
        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View|Response
     */
    public function edit(User $user)
    {
        $roles = ['EMPLOYEE' => 'Employee', 'SEO_MANAGER' => 'SEO Manager'];
        return view('admin.users.form', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $this->saveUser($request, $user);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->back();
    }

    private function saveUser(Request $request, User $user)
    {
        if ($user->id) {
            $validation_rules = [
                'email' => "required|string|email|max:255|unique:users,email,{$user->id}",
                'mobile' => "required|digits:10|unique:users,mobile,{$user->id}",
                'password' => 'sometimes|nullable|string|min:8',
            ];
        } else {
            $validation_rules = [
                'email' => 'required|string|email|max:255|unique:users',
                'mobile' => 'required|digits:10|unique:users',
                'password' => 'required|string|min:8',
            ];
        }
        $common = [
            'name' => 'required|string|max:255',
        ];
        $request->validate($validation_rules + $common);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        if (!empty($request->password))
            $user->password = Hash::make($request->password);
        $user->role = $request->role;
        if (empty($user->id))
            $user->is_active = true;
        $user->save();
    }

    public function status(User $user): RedirectResponse
    {
        $user->is_active = !$user->is_active;
        $user->save();
        return redirect()->back();
    }
}
