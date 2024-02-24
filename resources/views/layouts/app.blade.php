<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>College System </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @yield('css')
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="{{ route('home') }}"
                        class="d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none mt-2">
                        <span class="fs-5 d-none d-sm-inline">Administración Sistema</span>
                    </a>
                    <hr class="w-100 text-white">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link align-middle px-0 text-white">
                                <i class="bi bi-person-gear"></i> <span class="ms-1 d-none d-sm-inline">Usuarios</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}" class="nav-link align-middle px-0 text-white">
                                <i class="bi bi-person-add"></i> <span class="ms-1 d-none d-sm-inline">Alumnos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('teachers.index') }}" class="nav-link align-middle px-0 text-white">
                                <i class="bi bi-person-vcard"></i> <span
                                    class="ms-1 d-none d-sm-inline">Profesores</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('courses.index') }}" class="nav-link align-middle px-0 text-white">
                                <i class="bi bi-clipboard-check"></i> <span
                                    class="ms-1 d-none d-sm-inline">Cursos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subjets.index') }}" class="nav-link align-middle px-0 text-white">
                                <i class="bi bi-book"></i> <span class="ms-1 d-none d-sm-inline">Asignaturas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link align-middle px-0 text-white">
                                <i class="bi bi-pencil-square"></i> <span class="ms-1 d-none d-sm-inline">Ingreso
                                    Notas</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#"
                            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://i.pinimg.com/736x/64/81/22/6481225432795d8cdf48f0f85800cf66.jpg"
                                alt="user" width="30" height="30" class="rounded-circle">
                            <span
                                class="d-none d-sm-inline mx-1">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Salir</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
</body>

</html>
