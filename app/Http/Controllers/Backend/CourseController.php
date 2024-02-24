<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::with('teacher')->get();
        return view('backend.course.index', compact('courses'));
    }


    public function create()
    {
        $user = User::where('role', 'teacher')->get();
        return view('backend.course.create', compact('user'));
    }


    public function store(StoreRequest $request)
    {
        Course::create([
            'name' => $request->input('name'),
            'teacher_id' => $request->input('teacher_id')
        ]);

        return to_route('courses.index');
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $course = Course::with('teacher')->find($id);
        $users = User::where('role', 'teacher')->get();
        return view('backend.course.edit', compact('course', 'users'));
    }


    public function update(UpdateRequest $request, string $id)
    {
        $course = Course::with('teacher')->find($id);
        $course->update([
            'name' => $request->input('name'),
            'teacher_id' =>$request->input('teacher_id')
        ]);

        return to_route('courses.index');
    }


    public function destroy(string $id)
    {
        $course = Course::with('teacher')->find($id);
        $course->delete();
        return to_route('courses.index');
    }

    public function saveStudents(Request $request, $id)
    {
        $course = Course::find($id);
        $course->students()->sync($request->input('students'));

        return to_route('courses.index');
    }

    public function listStudents($id)
    {
        $course = Course::with('students', 'teacher')->find($id);
        //$students = User::doesntHave('courses')->where('role', 'student')->get();
        $students = User::where('role', 'student')->get();
        return view('backend.course.list_students', compact('course', 'students'));
    }
}
