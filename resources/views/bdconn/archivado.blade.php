<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Legajos Archivados - EPET N°20</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">

</head>

<body>

<header class="topbar">

    <button class="ham-btn" id="btnMenu">
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

        <span>
            Sistema de Gestión de Legajos
        </span>

    </div>

    <div class="userchip">

        <div class="av">
            {{ strtoupper(substr(Auth::user()->nombre, 0, 1)) }}
        </div>

        <div class="txt">
            <span>Usuario</span>
        </div>

    </div>

</header>


<div class="layout">



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
                    
                </span>

                <span class="label">
                    <a href="#">
                        Archivados
                    </a>
                </span>

            </div>

        </div>


        <div id="salir" class="salir">

            <span class="ic">
                <img src="/imagen/puerta.png">
            </span>

            <button
                type="button"
                class="btn btn-outline-info"
                data-bs-toggle="modal"
                data-bs-target="#cierre">

                Cerrar Sesion

            </button>

        </div>

    </div>


    <!-- CONTENIDO -->

    <main class="contenido">

        <div class="archivados-vista">


            <div class="archivados-header">

                <div>

                    <h1>
                        Legajos Archivados
                    </h1>

                    <p>
                        Consulta los legajos que fueron archivados.
                    </p>

                </div>


                <button
                    class="btn-volver-lista"
                    onclick="window.history.back()">

                    ← Volver

                </button>

            </div>


            <!-- LISTA -->

            <div class="lista-archivados">

                @forelse($archivados as $alumno)

                    <div class="archivado-card">


                        <div class="archivado-avatar">
                            <img src="../imagen/usuario.png" alt="Alumnos">
                        </div>


                        <div class="archivado-info">

                            <div class="archivado-nombre">

                                <h2>
                                    {{ $alumno->nombre }}
                                    {{ $alumno->apellido }}
                                </h2>

                                <span class="badge-archivado">
                                    ARCHIVADO
                                </span>

                            </div>


                            <div class="archivado-datos">

                                <span>
                                    <strong>DNI:</strong>
                                    {{ $alumno->dni }}
                                </span>

                                <span>
                                    <strong>Curso:</strong>
                                    {{ $alumno->curso->curso }}
                                    {{ $alumno->division->division }}
                                </span>

                                <span>
                                    <strong>Fecha de archivo:</strong>
                                    {{ $alumno->fecha_archivado ?? 'Sin registrar' }}
                                </span>

                            </div>

                        </div>


                        <a
                            href="#"
                            class="btn-ver-archivado">

                            Ver legajo →

                        </a>


                    </div>

                @empty

                    <div class="sin-archivados">

                        <span>📦</span>

                        <h3>
                            No hay legajos archivados
                        </h3>

                        <p>
                            No existen alumnos archivados actualmente.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </main>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>