@extends('layouts.app')

@section('title')
    Formulario Nuevo Curso
@endsection

@section('subtitle')
@endsection

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('subjets.store') }}" method="POST">
                @csrf
                <div class="row mt-3">

                    <div class="form-group">
                        <label for="name">Asignatura</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name') }}">
                        @error('name')
                            @include('common.validation-error')
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="course_id">Cursos</label>
                        <select name="course_id" id="course_id" class="form-control">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"> {{ $course->name }} </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i> Agregar Registro</button>
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
        var select = document.getElementById("course_id");
        multi(select, {
            enable_search: true,
            search_placeholder: 'Busqueda'
        });
    </script>
@endsection
