@extends('layouts.app')

@section('title')
    Listado de Cursos
@endsection

@section('subtitle')
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <div class="container-fluid py-3">
        <a href="{{ route('subjets.create') }}" class="py-5">
            <button class="btn btn-success">
                <i class="bi bi-file-earmark-plus"></i> Nuevo Registro
            </button>
        </a>
    </div>
    <table class="table table-secondary table-sm">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Asignatura</th>
                <th scope="col">Curso</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjets as $subjet)
                <tr class="text-center">
                    <th scope="row">{{ $subjet->id }}</th>
                    <td> {{ $subjet->name }} </td>
                    <td> {{ $subjet->course->name }} </td>
                    <td>
                        <a href="" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <form class="d-inline" action="" method="POST"
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
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
