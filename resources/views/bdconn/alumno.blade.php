<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>LEGAJOS - EPET N°20</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/general.css')}}">
<link rel="stylesheet" href="{{asset('css/formulario.css')}}">
</head>
<body>

<header class="topbar">

  <button class="ham-btn" id="btnMenu" title="Abrir / cerrar menú">&#9776;</button>
  <div class="logo">
    <div id="escudo"><img src="/imagen/epet.png" alt="Escudo EPET 20"></div>
    <div class="txt"><b>LEGAJOS</b><span>EPET N°20</span></div>
  </div>

  <div class="bienvenida-top">
    <b>¡Bienvenido/a!</b>
    <span>Sistema de Gestión de Legajos</span>
  </div>

  <div class="buscador">
    <form action="{{route('buscar')}}" method="post" >
    @csrf
      <input type="text"  placeholder="Buscar alumno..." name="buscador">
      <input class="lupa" type="submit" value="&#128269;">
    </form>
  </div>


  <div class="userchip">
    <div class="av">{{ strtoupper(substr(Auth::user()->nombre, 0, 1)) }}</div>
    <div class="txt"><b></b><span>Usuario</span></div>
  </div>
</header>

<div class="layout">
  <div class="sidebar" id="sidebar">
    <div>
      <div class="item act">
        <span class="ic"><img src="/imagen/casita.png" alt="Inicio"></span>
        <span class="label"><a href="{{ route(session('rol') === 'preceptor' ? 'inicio3' : 'inicio') }}">Inicio</a></span>
      </div>
      <div class="item">
        <span class="ic"><img src="/imagen/hoja.png" alt="Cursos"></span>
        <span class="label"><a href="">
          @if (session('rol')==='preceptor')
          Ver curso
          @else
          Cursos
          @endif
        </a></span>
      </div>
      
      <div id="salir" class="salir">
      <span class="ic"><img src="/imagen/puerta.png" ></span>
      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#cierre">Cerrar Sesion</button>
      </div>
    </div>
</div>

  <div class="contenido">
        <button type="button" class="btn-volver" onclick="window.history.back()">
             Volver
        </button>
      <section>
          <h2>Datos del alumno</h2>
          <div class="legajo-vista">

          <label for="nombre">Nombre y apellido</label>
          <p id="nombre">{{$alumno->nombre}} {{$alumno->apellido}}</p>

          <label for="dni">DNI</label>
          <p id="dni">{{$alumno->dni}}</p>

          <label for="curso">Curso</label>
          <p id="curso">{{$alumno->curso->curso}} {{$alumno->division->division}}</p>

          <label for="fecha">Fecha de nacimiento</label>
          <p id="">{{$alumno->fecha_nacimiento}}</p>

          <label for="telefono">Teléfono</label>
          <p id="">{{$alumno->telefono}}</p>

          <label for="email">Email</label>
          <p id="">{{$alumno->email}}</p>
          <div class="legajo-header">
    </div>

    <div class="legajo-contenedor">

        <div class="legajo-card">
        </div>

        <div class="legajo-card documentacion">
        </div>

    </div>

    <div class="acciones-legajo">
    </div>

</div>
      </section>
  </div>
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