@extends('layouts.app')

@section('title')
    Ingreso de Estudiantes a los Cursos
@endsection

@section('subtitle')
    Fue un grupo pequeño
@endsection

@section('content')
    <div class="card">

        <div class="card-body">



            <form action="{{ route('courses.save_students') }}" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="course_id">Curso</label>
                            <select class="form-control @error('course_id') is-invalid @enderror" id="course_id"
                                for="course_id" name='course_id'>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"> {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="students">Estudiantes</label>
                            <select multiple="multiple" name="students[]" id="students">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"> {{ $student->first_name }}
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
