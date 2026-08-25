<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>LEGAJOS - EPET N°20 - Secretaria</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/general.css')}}">
</head>
<body>

<header class="topbar">

  <button class="ham-btn" id="btnMenu" title="Abrir / cerrar menú">&#9776;</button>
  <div class="logo">
    <div id="escudo"><img src="/imagen/epet.png" alt="Escudo EPET 20"></div>
    <div class="txt"><b>LEGAJOS</b><span>EPET N°20</span></div>
  </div>

  <div class="bienvenida-top">
    <b>¡Bienvenido/a, Secretaría!</b>
    <span>Sistema de Gestión de Legajos</span>
  </div>

  <div class="buscador">
    <input type="text" placeholder="Buscar alumno...">
    <span class="lupa">&#128269;</span>
  </div>

  <div class="userchip">
    <div class="av">S</div>
    <div class="txt"><b>Secretaría</b><span>Usuario</span></div>
  </div>
</header>

<div class="layout">
  <div class="sidebar" id="sidebar">
    <div>
      <div class="item act">
        <span class="ic"><img src="imagen/casita.png" alt="Inicio"></span>
        <span class="label"><a href="{{route('inicio')}}">Inicio</a></span>
      </div>
      <div class="item">
        <span class="ic"><img src="imagen/hoja.png" alt="Cursos"></span>
        <span class="label"><a href="{{route('curso')}}">Cursos</a></span>
      </div>
      <div class="item">
        <span class="ic"><img src="imagen/usuario.png" alt="Alumnos"></span>
        <span class="label">Alumnos</span>
      </div>
      <div class="item">
        <span class="ic"><img src="imagen/mas.png" alt="Crear"></span>
        <span class="label"><a href="{{route('legajos.create')}}">Crear legajo</a></span>
      </div>
      <div id="salir" class="salir">
      <span class="ic"><img src="imagen/puerta.png" ></span>
      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#cierre">Cerrar Sesion</button>
      </div>
    </div>
  </div>

  <div class="contenido">
    <div class="panel-card">
      <h3>¡Bienvenido/a! <span class="badge-rol Secretaria">al panel de Secretaria</span></h3>
      <p class="sub">Panel principal · Resumen general del sistema</p>
      <p class="tip"></p>
    </div>
    <p id="aviso">{{ session('aviso') }}</p>
    <div class="stats-row" style="margin-bottom:22px;">
      <div class="stat-box blue">
        <div class="ic"><img src="imagen/usuario.png" alt=""></div>
        <div><div class="num">{{ $alumnos->count() }}</div><div class="lbl">Alumnos totales</div></div>
      </div>
      <div class="stat-box purple">
        <div class="ic"><img src="imagen/hoja.png" alt=""></div>
        <div><div class="num">22</div><div class="lbl">Documentos subidos al sistema</div></div>
      </div>
    </div>

    <h2 class="section-title">Cursos</h2>
    <p class="section-sub">Todos los cursos disponibles</p>

    <div class="cursos-cols">
      <div class="curso-col" data-turno="manana">
        <div class="titulo-col"><span class="dot manana"></span>Turno Mañana</div>
        <div class="curso-fila"><span>1° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 5°</span><span class="flecha">›</span></div>
      </div>

      <div class="curso-col" data-turno="tarde">
        <div class="titulo-col"><span class="dot tarde"></span>Turno Tarde</div>
        <div class="curso-fila"><span>1° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>1° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>2° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>3° 5°</span><span class="flecha">›</span></div>
      </div>

      <div class="curso-col" data-turno="vespertino">
        <div class="titulo-col"><span class="dot vespertino"></span>Turno Vespertino</div>
        <div class="curso-fila"><span>4° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>4° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>4° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>4° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>4° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>5° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>5° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>5° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>5° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>5° 5°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>6° 1°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>6° 2°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>6° 3°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>6° 4°</span><span class="flecha">›</span></div>
        <div class="curso-fila"><span>6° 5°</span><span class="flecha">›</span></div>
      </div>
    </div>
  </div>
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
  // Botón hamburguesa: colapsa/expande el sidebar (rectángulo de la izquierda)
  document.getElementById('btnMenu').addEventListener('click', function(){
    document.getElementById('sidebar').classList.toggle('colapsada');
  });

  var clasesPorTurno = {
  manana: 'sel-manana',
  tarde: 'sel-tarde',
  vespertino: 'sel-vespertino'
};

document.querySelectorAll('.curso-col').forEach(function(col) {
  col.addEventListener('click', function(event) {
    // Evita que el click se propague al document
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
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>