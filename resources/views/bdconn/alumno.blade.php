<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<title>LEGAJOS - EPET N°20 - Crear Legajo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/general.css')}}">

</head>
<body>
      <header class="topbar">

        <div class="logo">
            <div class="escudo">
                <img src="imagen/epet.jpg" alt="Escudo EPET 20">
            </div>

            <div class="txt">
                <b>LEGAJOS</b>
                <span>EPET N°20</span>
            </div>
        </div>

        <div class="bienvenida-top">
            <b>¡Bienvenido/a, Secretaría!</b>
            <span>Sistema de Gestión de Legajos</span>
        </div>

    </header>


    <div class="layout">
  <div class="sidebar" id="sidebar">
    <div>
      <div class="item act">
        <span class="ic"><img src="/imagen/casita.png" alt="Inicio"></span>
        <span class="label"><a href="{{route('inicio')}}">Inicio</a></span>
      </div>
      <div class="item">
        <span class="ic"><img src="/imagen/hoja.png" alt="Cursos"></span>
        <span class="label"><a href="{{route('curso')}}">Cursos</a></span>
      </div>
      <div class="item">
        <span class="ic"><img src="/imagen/mas.png" alt="Crear"></span>
        <span class="label"><a href="{{route('legajos.create')}}">Crear legajo</a></span>
      </div>
      <div class="item">
        <span class="ic"><img src="imagen/gorro.png" alt="Egresados"></span>
        <span class="label">Legajos de Egresados</span>
      </div>
      <div class="item">
        <span class="ic"><img src="" alt="Archivados"></span>
        <span class="label">Legajos Archivados</span>
      </div>
      <div id="salir" class="salir">
      <span class="ic"><img src="/imagen/puerta.png" ></span>
      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#cierre">Cerrar Sesion</button>
      </div>
    </div>
  </div>


        <!-- Contenido principal -->
        <main>

            <!-- Navegación -->
            <nav>
                <a href="{{route('inicio')}}">Inicio</a>
                >
                <a href="{{route('curso')}}">Cursos</a>
                >
                <span>6° 3°</span>
            </nav>


            <!-- Título -->
            <header>

                <h1>Legajo del Alumno</h1>

                <p>Información completa del alumno</p>

            </header>


            <!-- FORMULARIO -->
            <!--
                action="legajo.php"
                significa que cuando se envíe el formulario,
                los datos van a legajo.php
            -->
            <form action="legajo.php" method="POST">


                <!-- Datos personales -->
                <section>

                    <h2>Datos del alumno</h2>


                    <label for="nombre">
                        Nombre y apellido
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        placeholder="Nombre y apellido"
                    >


                    <label for="dni">
                        DNI
                    </label>

                    <input
                        type="text"
                        id="dni"
                        name="dni"
                        placeholder="DNI"
                    >


                    <label for="curso">
                        Curso
                    </label>

                    <input
                        type="text"
                        id="curso"
                        name="curso"
                        placeholder="Curso"
                    >


                    <label for="fecha">
                        Fecha de nacimiento
                    </label>

                    <input
                        type="date"
                        id="fecha"
                        name="fecha"
                    >


                    <label for="domicilio">
                        Domicilio
                    </label>

                    <input
                        type="text"
                        id="domicilio"
                        name="domicilio"
                        placeholder="Domicilio"
                    >


                    <label for="telefono">
                        Teléfono
                    </label>

                    <input
                        type="text"
                        id="telefono"
                        name="telefono"
                        placeholder="Teléfono"
                    >


                    <label for="tutor">
                        Tutor
                    </label>

                    <input
                        type="text"
                        id="tutor"
                        name="tutor"
                        placeholder="Nombre del tutor"
                    >


                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Correo electrónico"
                    >

                </section>


                <!-- Observaciones -->
                <section>

                    <h2>Observaciones</h2>

                    <!--
                        TEXTAREA sirve para escribir
                        un texto más largo
                    -->
                    <textarea
                        id="observaciones"
                        name="observaciones"
                        placeholder="Escriba las observaciones..."
                    ></textarea>

                </section>


                <!-- Botón -->
                <button type="submit">
                    Guardar Legajo
                </button>
                <div class="modal fade" id="cierre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" >¿Desea salir?</h1>
        <button type="button" class="btn-close" id="eliminar" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>Los cambios hechos seran permanentes pero debera ingresar nuevamente.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="{{route('logout')}}" method="POST">
        @csrf
            <button type="submit" class="btn btn-primary">Cerrar Sesion</button>
        </form>
      </div>
    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>