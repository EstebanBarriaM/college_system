@extends('layouts.app')

@section('title')
    Listado Estudiantes Curso
@endsection

@section('subtitle')
@endsection

@section('content')
    <div class="card">



        <div class="card-body">

            <h5> <span class="badge bg-primary">Curso</span> {{ $course->name }} </h5>
            <h5> <span class="badge bg-primary"> Profesor Jefe
                </span> {{ $course->teacher->first_name . ' ' . $course->teacher->last_name }} </h5>

            <form action="{{ route('courses.save_students', $course->id) }}" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="students">Estudiantes</label>
                            <select multiple="multiple" name="students[]" id="students">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ $course->students->contains($student) ? 'selected' : '' }}>
                                        {{ $student->first_name }}
                                        {{ $student->last_name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i> Agregar
                        Registro</button>
                </div>
            </form>

        </div>

    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/select_multi/multi.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/select_multi/multi.min.js') }}"></script>

    <script>
        var select = document.getElementById("students");
        multi(select, {
            enable_search: true,
            search_placeholder: 'Busqueda'
        });
    </script>
@endsection
