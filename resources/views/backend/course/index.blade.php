@extends('layouts.app')

@section('title')
    Listado Cursos
@endsection

@section('subtitle')
@endsection

@section('content')
    <div class="container-fluid py-3">
        <a href="{{ route('courses.create') }}" class="py-5">
            <button class="btn btn-success">
                <i class="bi bi-file-earmark-plus"></i> Nuevo Registro
            </button>
        </a>
    </div>
    <table class="table table-secondary table-sm">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Profesor Jefe</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr class="text-center">
                    <th scope="row">{{ $course->id }}</th>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->teacher->first_name }} {{ $course->teacher->last_name }}</td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <form class="d-inline" action="{{ route('courses.destroy', $course->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-file-earmark-x"></i>Eliminar
                            </button>
                        </form>
                        <a href="{{ route('courses.list_students', $course->id) }}" class="btn btn-primary">
                            <i class="bi bi-backpack"></i> Alumnos
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
