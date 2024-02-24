@extends('layouts.app')

@section('title')
    Listado Estudiantes
@endsection

@section('subtitle')
@endsection

@section('content')
    <div class="container-fluid py-3">
        <a href="{{ route('students.create') }}" class="py-5">
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
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Rut</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="text-center">
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->rut }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <form class="d-inline" action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-file-earmark-x"></i>Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
