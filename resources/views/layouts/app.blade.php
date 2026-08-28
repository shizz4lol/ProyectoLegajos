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
    <b>¡Bienvenido/a, {{Auth::user()->tipo_rol }}!</b>
    <span>Sistema de Gestión de Legajos</span>
  </div>
<!-- 
  <div class="buscador">
    <form action="{{route('buscar')}}" method="post" >
      <input type="text"  placeholder="Buscar alumno..."name="buscador" autocomplete="off">
      <input class="lupa" type="submit" value="&#128269;">
    </form>
  </div>  -->
  <div class="buscador">
  <form action="{{route('buscar')}}" method="post" >
      <input type="text"  placeholder="Buscar alumno..."name="buscador" autocomplete="off">
      <button class="lupa" type="button">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </button>
    </form>
</div>

  <div class="userchip">
    <div class="av">{{ strtoupper(substr(Auth::user()->nombre, 0, 1)) }}</div>
    <div class="txt"><b>{{Auth::user()->tipo_rol }}</b><span>{{Auth::user()->nombre }}</span></div>
  </div>
</header>

<div class="layout">
  <div class="sidebar" id="sidebar">
    <div>
      <div class="item act">
        <a href="{{ (session('rol') === 'secretaria' || session('rol') === 'jefe') ? route('inicio') : route('inicio3') }}">
            <span class="ic"><img src="/imagen/casita.png" alt="Inicio"></span>
            <span class="label">Inicio</span>
        </a>
      </div>
      <div class="item">
        <a href="{{ session('rol') === 'preceptor' ? route('curso', ['id_curso' => session('prece_curso'),
            'id_division' => session('prece_division')
             ]): route('cursosfull') }}">
             <span class="ic"><img src="/imagen/hoja.png" alt="Cursos"></span>
             <span class="label">{{ session('rol') === 'preceptor' ? 'Ver curso' : 'Cursos' }}</span>
        </a>
      </div>
      @if (session('rol') === 'secretaria')
        <div class="item">
            <a href="{{ route('legajos.create') }}">
                <span class="ic"><img src="/imagen/mas.png" alt="Crear"></span>
                <span class="label">Crear legajo</span>
            </a>
        </div>
        <div class="item">
            <a>
            <span class="ic"><img src="/imagen/gorro.png" alt="Egresados"></span>
            <span class="label">Legajos de Egresados</span>
            </a>
        </div>
        <div class="item">
            <a>
            <span class="ic"><img src="" alt="Archivados"></span>
            <span class="label">Legajos Archivados</span>
            </a>
        </div>
       @endif
      <div id="salir" class="salir">
      <span class="ic"><img src="/imagen/puerta.png" ></span>
      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#cierre">Cerrar Sesion</button>
      </div>
    </div>
  </div>
<div class="contenido">
    @yield('contenido')
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

<script>
  /* // Botón hamburguesa: colapsa/expande el sidebar (rectángulo de la izquierda)
  document.getElementById('btnMenu').addEventListener('click', function(){
    document.getElementById('sidebar').classList.toggle('colapsada');
  }); */
  var sidebar = document.getElementById('sidebar');
        var btnMenu = document.getElementById('btnMenu');
        sidebar.classList.add('colapsada');
        btnMenu.addEventListener('click', function() {
             sidebar.classList.toggle('colapsada');
         });
    @if (session('rol') != 'preceptor')
    var clasesPorTurno = {
    manana: 'sel-manana',
    tarde: 'sel-tarde',
    vespertino: 'sel-vespertino'
    };

    document.querySelectorAll('.curso-col').forEach(function(col) {
        col.addEventListener('click', function(event) {
            event.stopPropagation();
            document.querySelectorAll('.curso-col').forEach(function(c) {
            c.classList.remove(
                'sel-manana',
                'sel-tarde',
                'sel-vespertino'
            );
            });
       col.classList.add(clasesPorTurno[col.dataset.turno]);
        });
    });
    document.addEventListener('click', function(event) {
      if (!event.target.closest('.curso-col')) {
        document.querySelectorAll('.curso-col').forEach(function(col) {
          col.classList.remove(
            'sel-manana',
            'sel-tarde',
            'sel-vespertino'
          );
        });
      }
    });
@endif
</script>
@yield('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>