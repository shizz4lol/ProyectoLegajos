<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
<title>LEGAJOS - EPET N°20</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/general.css')}}">

</head>
<body>

<header class="topbar">
  <div class="logo">
    <div class="escudo"><img src="/imagen/epet.png" alt="Escudo EPET 20"></div>
    <div class="txt"><b>LEGAJOS</b><span>EPET N°20</span></div>
  </div>

  <button class="ham-btn" id="btnMenu" title="Abrir / cerrar menú">&#9776;</button>

  <div class="bienvenida-top">
    <b>¡Bienvenido/a, {{Auth::user()->tipo_rol}}!</b>
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
    <div class="txt"><b>{{Auth::user()->tipo_rol }}</b><span>{{Auth::user()->nombre }}</span></div>
    <span class="chevron">&#8964;</span>
  </div>
</header>

<div class="layout">
  <div class="sidebar" id="sidebar">
    <div>
      <div class="item">
        <span class="ic"><img src="/imagen/casita.png" alt="Inicio"></span>
        <span class="label"><a href="">Inicio</a></span>
      </div>
      <div class="item act">
        <span class="ic"><img src="/imagen/hoja.png" alt="Cursos"></span>
        <span class="label"><a href="">Ver curso</a></span>
      </div>
    </div>
    <div id="salir" class="salir">
      <span class="ic"><img src="/imagen/puerta.png" ></span>
      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#cierre">Cerrar Sesion</button>
      </div>
  </div>

  <div class="contenido">

    <div class="curso-header">
      <div class="curso-header-left">
        <div>
          <h2>Resultado de busqueda</h2>
          <p>Listado de alumnos</p>
        </div>
      </div>
    </div>
@if ($resultados->isEmpty())
<h2>No hay coincidencias</h2>
@else
    <table class="tabla-curso">
      <thead>
        <tr>
          <th>N°</th>
          <th>Alumno</th>
          <th>DNI</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($resultados as $indice => $alumno)
        <tr>
            <td class="col-numero">{{ $indice + 1 }}</td>

            <td>
                {{ $alumno->apellido }}, {{ $alumno->nombre }}
            </td>

            <td>
                {{ $alumno->dni }}
           </td>
           <td>
           <a href="{{ route('alumnos', $alumno) }}">
                      <button class="accion-btn" title="Ver legajo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                    </a>
           </td>
            <!-- <td class="col-acciones">
                <div class="acciones-grupo">

                    
                    <a href="{{ route('alumnos', $alumno) }}">
                      <button class="accion-btn" title="Ver legajo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                    </a>
                        

                    <button class="accion-btn" title="Editar legajo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                        </svg>
                    </button>

                    <button class="accion-btn" title="Descargar legajo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                    </button>

                </div>
            </td> -->
        </tr>
    @endforeach
  @endif
</tbody>
    </table>

  </div>
</div>

<script>


document.getElementById('btnMenu').addEventListener('click', function(){
    document.getElementById('sidebar').classList.toggle('colapsada');

});

/* document.querySelectorAll('.accion-btn').forEach(function(boton){
    boton.addEventListener('click', function(){

        var accion = boton.getAttribute('title');

        if (accion === 'Ver legajo') {
            alert('Ver legajo');
        }

        if (accion === 'Editar legajo') {
            alert('Editar legajo');
        }

        if (accion === 'Descargar legajo') {
            alert('Descargar legajo');
        }

    });

}); */

</script>
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