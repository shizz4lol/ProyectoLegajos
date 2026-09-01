<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Legajos Egresados - EPET N°20</title>

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


    <div class="buscador">

        <form action="{{ route('buscar') }}" method="post">

            @csrf

            <input
                type="text"
                name="buscador"
                placeholder="Buscar alumno..."
            >

            <input
                class="lupa"
                type="submit"
                value="&#128269;"
            >

        </form>

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

                    <a href="{{route('legajos.create')}}">
                        Egresados
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


    <main class="contenido">

        <div class="egresados-vista">



            <div class="egresados-header">

                <div>

                    <h1>
                        <div class="item">
        <span class="ic"><img src="../imagen/gorro.png" alt="Alumnos"></span>
        <span class="label"></span>
      </div>
                    </h1>

                    <p>
                        Consulta los legajos de alumnos que finalizaron sus estudios.
                    </p>

                </div>


                <button
                    class="btn-volver-lista"
                    onclick="window.history.back()">

                    ← Volver

                </button>

            </div>

            <div class="años-egresados">

                @forelse($egresados->groupBy('año_egreso') as $año => $alumnos)

                    <div class="año-egresado">


                        <div
                            class="año-egresado-header"
                            onclick="toggleAño(this)">

                            <div class="año-info">

                                <div class="año-icono">
                                </div>

                                <div>

                                    <h2>
                                        {{ $año }}
                                    </h2>

                                    <span>
                                        {{ $alumnos->count() }}
                                        egresados
                                    </span>

                                </div>

                            </div>


                            <span class="flecha-año">
                                +
                            </span>

                        </div>


                        <div class="lista-egresados">


                            @foreach($alumnos as $alumno)

                                <div class="egresado-item">

                                    <div class="egresado-numero">
                                        {{ $loop->iteration }}
                                    </div>


                                    <div class="egresado-avatar">
                                        <span class="ic"><img src="../imagen/usuario.png" alt="Alumnos"></span>
                                    <span class="label"></span>
                                    </div>
                                    


                                    <div class="egresado-datos">

                                        <strong>
                                            {{ $alumno->nombre }}
                                            {{ $alumno->apellido }}
                                        </strong>

                                        <span>
                                            DNI:
                                            {{ $alumno->dni }}
                                        </span>

                                    </div>


                                    <a
                                        href="#"
                                        class="btn-ver-egresado">

                                        Ver legajo →

                                    </a>

                                </div>

                            @endforeach


                        </div>

                    </div>

                @empty

                    <div class="sin-egresados">

                        <span>🎓</span>

                        <h3>
                            No hay egresados registrados
                        </h3>

                        <p>
                            Todavía no existen legajos de egresados.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </main>

</div>


<script>

function toggleAño(elemento) {

    const tarjeta = elemento.parentElement;

    tarjeta.classList.toggle("abierto");

}

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>