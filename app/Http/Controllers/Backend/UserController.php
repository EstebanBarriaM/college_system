<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\User\StoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {

        $users = User::where('role', 'admin')->orderBy('id', 'DESC')->paginate(5);

        return view('backend.user.index', compact('users'));
    }


    public function create()
    {
        return view('backend.user.create');
    }


    public function store(StoreRequest $request)
    {

        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rut' => $request->input('rut'),
            'role' => 'admin'
        ]);

        return to_route('users.index');

    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }


    public function update(UpdateRequest $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rut' => $request->input('rut'),
        ]);
        return to_route('users.index');
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return to_route('users.index');
    }
}
