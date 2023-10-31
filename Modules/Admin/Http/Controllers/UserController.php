<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\Renderable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('admin::user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::user.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $validated['password'] = Hash::make('password');

        User::create($validated);
        return redirect()->route('admin.user.index')->with('success', 'Felhasználó sikeresen létrehozva!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $user = User::find($id);

        if ($user) {
            return view('admin::user.edit', compact('user'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back();
        }

        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ];

        // Add password validation rules only if password is filled in the request
        if ($request->filled('password')) {
            $rules['password'] = 'required|confirmed';
        }

        $validated = $request->validate($rules);

        // Update password only if it's filled in the request
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return redirect()->back()->with('success', 'Felhasználó sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back();
        }

        $user->delete();
        return redirect()->back()->with('success', 'Felhasználó sikeresen törölve!');
    }
}
