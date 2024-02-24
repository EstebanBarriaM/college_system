<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = User::where('role', 'student')->get();

        return view('backend.student.index', compact('students'));
    }

    public function create()
    {
        return view('backend.student.create');
    }

    public function store(StoreRequest $request)
    {
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rut' => $request->input('rut'),
            'role' => 'student'
        ]);

        return to_route('students.index');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('backend.student.edit', compact('user'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rut' => $request->input('rut')
        ]);

        return to_route('students.index');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return to_route('students.index');
    }
}
