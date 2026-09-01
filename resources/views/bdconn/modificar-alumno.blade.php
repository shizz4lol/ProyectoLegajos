<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LEGAJOS - Modificar alumno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
</head>

<body>

<header class="topbar">

    <button class="ham-btn" id="btnMenu" title="Abrir / cerrar menú">
        &#9776;
    </button>

    <div class="logo">
        <div id="escudo">
            <img src="/imagen/epet.png" alt="Escudo EPET 20">
        </div>

        <div class="txt">
            <b>LEGAJOS</b>
            <span>EPET N°20</span>
        </div>
    </div>

    <div class="bienvenida-top">
        <b>¡Bienvenido/a!</b>
        <span>Sistema de Gestión de Legajos</span>
    </div>

    <div class="userchip">
        <div class="av">
            {{ strtoupper(substr(Auth::user()->nombre, 0, 1)) }}
        </div>

        <div class="txt">
            <b></b>
            <span>Usuario</span>
        </div>
    </div>

</header>


<div class="layout">

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">

        <div>

            <div class="item">
                <span class="ic">
                    <img src="/imagen/casita.png" alt="Inicio">
                </span>

                <span class="label">
                    <a href="{{ route(session('rol') === 'preceptor' ? 'inicio3' : 'inicio') }}">
                        Inicio
                    </a>
                </span>
            </div>

            <div class="item">
                <span class="ic">
                    <img src="/imagen/hoja.png" alt="Cursos">
                </span>

                <span class="label">
                    <a href="">
                        @if(session('rol') === 'preceptor')
                            Ver curso
                        @else
                            Cursos
                        @endif
                    </a>
                </span>
            </div>

            <div id="salir" class="salir">

                <span class="ic">
                    <img src="/imagen/puerta.png" alt="Salir">
                </span>

                <button type="button"
                        class="btn btn-outline-info"
                        data-bs-toggle="modal"
                        data-bs-target="#cierre">
                    Cerrar Sesion
                </button>

            </div>

        </div>

    </div>


    <!-- CONTENIDO -->
    <main class="contenido">

        <div class="titulo">

            <h1>Modificar alumno</h1>

            <p>
                Modifique los datos del alumno seleccionado.
            </p>

        </div>


        <!-- FORMULARIO -->

        <form action="{{ route('alumno.update', $alumno->id) }}"
              method="POST">

            @csrf
            @method('PUT')


            <!-- DATOS DEL ALUMNO -->

            <div class="tarjeta">

                <h2>Datos personales</h2>

                <div class="form-grid">


                    <div class="campo">

                        <label for="nombre">
                            Nombre
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre', $alumno->nombre) }}"
                            required>

                    </div>


                    <div class="campo">

                        <label for="apellido">
                            Apellido
                        </label>

                        <input
                            type="text"
                            id="apellido"
                            name="apellido"
                            value="{{ old('apellido', $alumno->apellido) }}"
                            required>

                    </div>


                    <div class="campo">

                        <label for="dni">
                            DNI
                        </label>

                        <input
                            type="text"
                            id="dni"
                            name="dni"
                            value="{{ old('dni', $alumno->dni) }}"
                            required>

                    </div>


                    <div class="campo">

                        <label for="fecha_nacimiento">
                            Fecha de nacimiento
                        </label>

                        <input
                            type="date"
                            id="fecha_nacimiento"
                            name="fecha_nacimiento"
                            value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}"
                            required>

                    </div>


                    <div class="campo">

                        <label for="telefono">
                            Teléfono
                        </label>

                        <input
                            type="text"
                            id="telefono"
                            name="telefono"
                            value="{{ old('telefono', $alumno->telefono) }}">

                    </div>


                    <div class="campo">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $alumno->email) }}">

                    </div>


                    <!-- CURSO -->

                    <div class="campo">

                        <label for="curso">
                            Curso
                        </label>

                        <select id="curso" name="curso_id" required>

                            @foreach($cursos as $curso)

                                <option value="{{ $curso->id }}"
                                    {{ $alumno->curso_id == $curso->id ? 'selected' : '' }}>

                                    {{ $curso->curso }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- DIVISIÓN -->

                    <div class="campo">

                        <label for="division">
                            División
                        </label>

                        <select id="division" name="division_id" required>

                            @foreach($divisiones as $division)

                                <option value="{{ $division->id }}"
                                    {{ $alumno->division_id == $division->id ? 'selected' : '' }}>

                                    {{ $division->division }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                </div>

            </div>


            <!-- OBSERVACIONES -->

            <div class="tarjeta">

                <h2>Observaciones</h2>

                <div class="campo">

                    <label for="observaciones">
                        Observaciones del alumno
                    </label>

                    <textarea
                        id="observaciones"
                        name="observaciones"
                        placeholder="Ingrese alguna observación...">{{ old('observaciones', $alumno->observaciones ?? '') }}</textarea>

                </div>

            </div>


            <!-- BOTONES -->

            <div class="acciones">

                <button
                    type="button"
                    class="btn-volver"
                    onclick="window.history.back()">

                    Cancelar

                </button>

                <button
                    type="submit"
                    class="btn-guardar">

                    Guardar cambios

                </button>

            </div>


        </form>

    </main>

</div>


<!-- MODAL CERRAR SESIÓN -->

<div class="modal fade"
     id="cierre"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title fs-5">
                    ¿Desea salir?
                </h1>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <p>
                    Los cambios hechos serán permanentes
                    pero deberá ingresar nuevamente.
                </p>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                    Cancelar

                </button>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Cerrar Sesion

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>