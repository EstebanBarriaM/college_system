@extends('layouts.app')

@section('title')
    Formulario Editar Curso
@endsection

@section('subtitle')
@endsection

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mt-3">
                    <div class="col">
                        <label for="name">Curso</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name', $course->name) }}">
                        @error('name')
                            @include('common.validation-error')
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="teacher_id">Profesor Jefe</label>
                            <select class="form-control @error('teacher_id') is-invalid @enderror" id="teacher_id"
                                name='teacher_id'>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('teacher_id', $course->teacher_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success"><i class="bi bi-arrow-clockwise"></i> Actualizar
                        Registro</button>
                </div>
            </form>

        </div>

    </div>
@endsection
