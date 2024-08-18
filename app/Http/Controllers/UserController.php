<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users'=> User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        Session::flash('success', 'User added successfully');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */

    public function trash($id)
    {
        User::Destroy($id);
        Session::Flash('success', 'User trashed successfully');
        return redirect() -> route('users.index');
    }

    public function destroy($id)
    {
        $user = User::WithTrashed()->where('id',$id)->first();
        $user = forceDelete();
        Session::Flash('success', 'User deleted successfully');
        return redirect()->route('users.trashed');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id',$id)->first();
        $user -> restore();
        Session::Flash('success','User restored successfully');
        return redirect()->route('users.trashed');
    }
}
