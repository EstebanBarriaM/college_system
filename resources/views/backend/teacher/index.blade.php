@extends('layouts.app')

@section('title')
    Listado Profesores
@endsection

@section('subtitle')
@endsection

@section('content')
    <div class="container-fluid py-3">
        <a href="{{ route('teachers.create') }}" class="py-5">
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
            @foreach ($teachers as $teacher)
                <tr class="text-center">
                    <th scope="row">{{ $teacher->id }}</th>
                    <td>{{ $teacher->first_name }}</td>
                    <td>{{ $teacher->last_name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->rut }}</td>
                    <td>
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <form class="d-inline" action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-file-earmark-x"></i>Elimnar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $teachers->links('vendor.pagination.bootstrap-4') }}
@endsection
