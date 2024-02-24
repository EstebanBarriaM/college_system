@extends('layouts.app')

@section('title')
    Formulario Nuevo Usuario
@endsection

@section('content')
    <div class="py-3">
        <a href="{{ route('users.index') }}" class="py-5">
            <button class="btn btn-primary">
                <i class="bi bi-arrow-return-left"></i> Volver
            </button>
        </a>
    </div>

    <div class="card">

        <div class="card-body">

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mt-3">
                    <div class="col">
                        <label for="first_name">Nombre</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                            name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}">
                        @error('first_name')
                            @include('common.validation-error')
                        @enderror
                    </div>
                    <div class="col">
                        <label for="last_name">Apellido</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                            id="last_name" value="{{ old('last_name', $user->last_name) }}">
                        @error('last_name')
                            @include('common.validation-error')
                        @enderror
                    </div>
                    <div class="col">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                            @include('common.validation-error')
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" value="{{ old('password') }}" placeholder="Opcional">
                        @error('password')
                            @include('common.validation-error')
                        @enderror
                    </div>
                    <div class="col">
                        <label for="rut">Rut</label>
                        <input type="text" class="form-control @error('rut') is-invalid @enderror" name="rut"
                            id="rut" value="{{ old('rut', $user->rut) }}" oninput="checkRut(this);" maxlength="10">
                        @error('rut')
                            @include('common.validation-error')
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success"><i class="bi bi-arrow-clockwise"></i> Editar
                        Registro</button>
                </div>
            </form>

        </div>

    </div>
@endsection

@section('scripts')
    <script>
        function checkRut(rut) {
            // Despejar Puntos
            var valor = rut.value.replace('.', '');
            // Despejar Guión
            valor = valor.replace('-', '');

            // Aislar Cuerpo y Dígito Verificador
            cuerpo = valor.slice(0, -1);
            dv = valor.slice(-1).toUpperCase();

            // Formatear RUN
            rut.value = cuerpo + '-' + dv

            // Calcular Dígito Verificador
            suma = 0;
            multiplo = 2;

            // Para cada dígito del Cuerpo
            for (i = 1; i <= cuerpo.length; i++) {

                // Obtener su Producto con el Múltiplo Correspondiente
                index = multiplo * valor.charAt(cuerpo.length - i);

                // Sumar al Contador General
                suma = suma + index;

                // Consolidar Múltiplo dentro del rango [2,7]
                if (multiplo < 7) {
                    multiplo = multiplo + 1;
                } else {
                    multiplo = 2;
                }

            }

            // Calcular Dígito Verificador en base al Módulo 11
            dvEsperado = 11 - (suma % 11);

            // Casos Especiales (0 y K)
            dv = (dv == 'K') ? 10 : dv;
            dv = (dv == 0) ? 11 : dv;
        }
    </script>
@endsection
