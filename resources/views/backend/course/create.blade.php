@extends('layouts.app')

@section('title')
    Formulario Nuevo Curso
@endsection

@section('subtitle')
@endsection

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col">
                        <label for="name">Curso</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name') }}">
                        @error('name')
                            @include('common.validation-error')
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="teacher_id">Profesor Jefe</label>
                            <select class="form-control @error('teacher_id') is-invalid @enderror" id="teacher_id"
                                for="teacher_id" name='teacher_id'>
                                @foreach ($user as $us)
                                    <option value="{{ $us->id }}"> {{ $us->first_name }} {{ $us->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i> Agregar Registro</button>
                </div>
            </form>

        </div>

    </div>
@endsection
