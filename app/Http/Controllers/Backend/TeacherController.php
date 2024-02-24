<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class TeacherController extends Controller
{

    public function index()
    {
        $teachers = User::where('role', 'teacher')->paginate(5);
        return view('backend.teacher.index', compact('teachers'));
    }


    public function create()
    {
        return view('backend.teacher.create');
    }

    public function store(StoreRequest $request)
    {

        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rut' => $request->input('rut'),
            'role' => 'teacher'
        ]);

        return to_route('teachers.index');

    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $user = User::find($id);
        return view('backend.teacher.edit', compact('user'));
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

        return to_route('teachers.index');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return to_route('teachers.index');
    }
}
