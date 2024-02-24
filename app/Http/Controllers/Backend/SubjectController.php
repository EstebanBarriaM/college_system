<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function index()
    {
        $subjets = Subject::all();
        return view('backend.subject.index', compact('subjets'));
    }


    public function create()
    {
        $courses = Course::all();
        return view('backend.subject.create', compact('courses'));
    }


    public function store(Request $request)
    {

        Subject::create([
            'name' => $request->input('name'),
            'course_id' => $request->input('course_id')
        ]);

        return to_route('subjets.index');
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {

    }


    public function update(Request $request, string $id)
    {

    }


    public function destroy(string $id)
    {

    }
}
