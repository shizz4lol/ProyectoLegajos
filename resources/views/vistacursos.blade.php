<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>LEGAJOS - EPET N°20 - Cursos</title>

    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
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

  <div class="buscador">
    <form action="{{route('buscar')}}" method="post" >
      <input type="text"  placeholder="Buscar alumno..."name="buscador" autocomplete="off">
      <input class="lupa" type="submit" value="&#128269;">
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
        <span class="ic"><img src="imagen/casita.png" alt="Inicio"></span>
        <span class="label"><a href="{{route('inicio')}}">Inicio</a></span>
      </div>
      <div class="item">
        <span class="ic"><img src="imagen/hoja.png" alt="Cursos"></span>
        <span class="label"><a href="">Cursos</a></span>
      </div>
      <div class="item">
        <span class="ic"><img src="imagen/mas.png" alt="Crear"></span>
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
      <span class="ic"><img src="imagen/puerta.png" ></span>
      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#cierre">Cerrar Sesion</button>
      </div>
    </div>
  </div>
   
    <div class="contenido">
        <main>

            <nav class="breadcrumb">

                <a href="index.html">Inicio</a>

                <span>›</span>

                <span>Cursos</span>

            </nav>
          
            <header>
                <h1>Cursos</h1>
                <p>Seleccione un año para ver los cursos disponibles</p>
            </header>

        
            <section class="seleccion-cursos">

                <h2>Años</h2>

                <div class="años-container">
                  
                    <div class="año-card" data-año="primero">
                        <div class="año-titulo">
                            <h3>1° Año</h3>
                            <span>+</span>
                        </div>

                        <div class="cursos-container">

                            <a href="cursos.html" class="curso-card">
                                1° 1°
                            </a>

                            <a href="cursos.html" class="curso-card">
                                1° 2°
                            </a>

                            <a href="cursos.html" class="curso-card">
                                1° 3°
                            </a>

                        </div>

                    </div>


                   
                    <div class="año-card" data-año="segundo">

                        <div class="año-titulo">
                            <h3>2° Año</h3>
                            <span>+</span>
                        </div>

                        <div class="cursos-container">

                            <a href="cursos.html" class="curso-card">
                                2° 1°
                            </a>

                            <a href="cursos.html" class="curso-card">
                                2° 2°
                            </a>

                            <a href="cursos.html" class="curso-card">
                                2° 3°
                            </a>

                        </div>

                    </div>


                    <div class="año-card" data-año="tercero">

                        <div class="año-titulo">
                            <h3>3° Año</h3>
                            <span>+</span>
                        </div>

                        <div class="cursos-container">

                            <a href="cursos.html" class="curso-card">
                                3° 1°
                            </a>

                            <a href="cursos.html" class="curso-card">
                                3° 2°
                            </a>

                            <a href="cursos.html" class="curso-card">
                                3° 3°
                            </a>

                        </div>

                    </div>

                    <div class="año-card" data-año="cuarto">

                        <div class="año-titulo">
                            <h3>4° Año</h3>
                            <span>+</span>
                        </div>

                        <div class="cursos-container">

                            <a href="cursos.html" class="curso-card">
                                4° 1°
                            </a>

                            <a href="cursos.html" class="curso-card">
                                4° 2°
                            </a>

                            <a href="cursos.html" class="curso-card">
                                4° 3°
                            </a>

                        </div>

                    </div>


                    <div class="año-card" data-año="quinto">

                        <div class="año-titulo">
                            <h3>5° Año</h3>
                            <span>+</span>
                        </div>

                        <div class="cursos-container">

                            <a href="cursos.html" class="curso-card">
                                5° 1°
                            </a>

                            <a href="cursos.html" class="curso-card">
                                5° 2°
                            </a>

                            <a href="cursos.html" class="curso-card">
                                5° 3°
                            </a>

                        </div>

                    </div>


                    <div class="año-card" data-año="sexto">

                        <div class="año-titulo">
                            <h3>6° Año</h3>
                            <span>+</span>
                        </div>

                        <div class="cursos-container">

                            <a href="cursos.html" class="curso-card">
                                6° 1°
                            </a>

                            <a href="cursos.html" class="curso-card">
                                6° 2°
                            </a>

                            <a href="cursos.html">
                                6° 3°
                            </a>

                        </div>

                    </div>

                </div>

            </section>

        </main>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <!-- JavaScript propio -->
    <script>

        // Seleccionar un año para mostrar u ocultar sus cursos

        document.querySelectorAll('.año-card').forEach(function(año) {
            año.addEventListener('click', function(event) {
                // Si se hizo clic directamente sobre un curso,
                // no ejecutamos la apertura/cierre del año
                if (event.target.classList.contains('curso-card')) {
                    return;
                }
                año.classList.toggle('abierto');
            });

        });


        // Botón hamburguesa

        var btnMenu = document.getElementById('btnMenu');
        var sidebar = document.getElementById('sidebar');
        if (btnMenu && sidebar) {

            btnMenu.addEventListener('click', function() {
                sidebar.classList.toggle('colapsada');
            });
        }
    </script>

</body>

</html>