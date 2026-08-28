<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
<title>LEGAJOS - EPET N°20 - Crear Legajo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/general.css')}}">

</head>
<body>

<header class="topbar">
  <div class="logo">
    <div class="escudo"><img src="imagen/epet.jpg" alt="Escudo EPET 20"></div>
    <div class="txt"><b>LEGAJOS</b><span>EPET N°20</span></div>
  </div>

  <button class="ham-btn" id="btnMenu" title="Abrir / cerrar menú">&#9776;</button>

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
    <span class="chevron">&#8964;</span>
  </div>
</header>

<div class="layout">
  <div class="sidebar" id="sidebar">
    <div>
      <div class="item">
        <span class="ic"><img src="imagen/casita.png" alt="Inicio"></span>
        <span class="label">Inicio</span>
      </div>
      <div class="item act">
        <span class="ic"><img src="imagen/hoja en blanco.png" alt="Cursos"></span>
        <span class="label">Cursos</span>
      </div>
      <div class="item">
        <span class="ic"><img src="imagen/usuario.png" alt="Alumnos"></span>
        <span class="label">Alumnos</span>
      </div>
      <div class="item">
        <span class="ic"><img src="imagen/hoja en blanco.png" alt="Legajos"></span>
        <span class="label">Legajos Egresados</span>
      </div>
      <div class="item">
        <span class="ic">&#10133;</span>
        <span class="label">Crear Legajo</span>
      </div>
    </div>
    <a class="salir" href="">
      <span class="ic"><img src="imagen/puerta.png" alt="Cerrar sesión"></span>
      <span class="label">Cerrar sesión</span>
    </a>
  </div>

  <div class="contenido">

    <div class="curso-header">
      <div class="curso-header-left">
        <div class="icono-circular">
          <!-- Ícono de personas (SVG), se recolorea solo con "color: ..." en CSS gracias a stroke="currentColor" -->
          <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <div>
          <h2>Curso: 6° 3ª</h2>
          <p>Listado de alumnos</p>
        </div>
      </div>

      <div class="buscador-curso">
        <input type="text" placeholder="Buscar en este curso...">
        <button class="btn-buscar-curso" type="button">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </button>
      </div>
    </div>

    <table class="tabla-curso">
      <thead>
        <tr>
          <th>N°</th>
          <th>Alumno</th>
          <th>DNI</th>
          <th>Acciones</th>
        </tr>
      </thead>
<div class="tabla-contenedor">
    <table>
        <!-- Aquí van tus <th> con los títulos de la tabla -->
        <tbody>
            @foreach ($alumnos as $indice => $alumno)
                <tr>
                    <td class="col-numero">{{ $indice + 1 }}</td>

                    <td>
                        {{ $alumno->apellido }}, {{ $alumno->nombre }}
                    </td>

                    <td>
                        {{ $alumno->dni }}
                    </td>

                    <td class="col-acciones">
                        <div class="acciones-grupo">
                            <button class="accion-btn" title="Ver legajo">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>

                            <button class="accion-btn" title="Editar legajo">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                            </button>

                            <button class="accion-btn" title="Descargar legajo">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </table>

  </div>
</div>

<script>


document.getElementById('btnMenu').addEventListener('click', function(){
    document.getElementById('sidebar').classList.toggle('colapsada');

});

document.querySelectorAll('.accion-btn').forEach(function(boton){
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

});
var buscador = document.querySelector('.buscador-curso input');
var botonBuscar = document.querySelector('.btn-buscar-curso');

botonBuscar.addEventListener('click', function(){

    var texto = buscador.value.toLowerCase();

    document.querySelectorAll('.tabla-curso tbody tr').forEach(function(fila){

        if (fila.textContent.toLowerCase().includes(texto)) {
            fila.style.display = '';
        } else {
            fila.style.display = 'none';
        }

    });

});
document.querySelector('.salir').addEventListener('click', function(event){
    event.preventDefault();

    if (confirm('¿Seguro que querés cerrar sesión?')) {

        alert('Sesión cerrada');
    }

});
</script>
</body>
</html>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>