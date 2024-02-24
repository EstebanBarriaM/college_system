@extends('layouts.app')

@section('title')
    Listado Usuarios
@endsection

@section('subtitle')
@endsection

@section('content')
    <div class="container-fluid py-3">
        <a href="{{ route('users.create') }}" class="py-5">
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
            @foreach ($users as $user)
                <tr class="text-center">
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->rut }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="POST"
                            onsubmit="return confirm('Esta seguro de eliminar el registro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i
                                    class="bi bi-file-earmark-x"></i>Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links('vendor.pagination.bootstrap-4') }}
@endsection
