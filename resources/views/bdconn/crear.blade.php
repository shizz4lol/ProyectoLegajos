<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
    <link rel="stylesheet" href="{{asset('css/formulario.css')}}">

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
  <div class="sidebar colapsada" id="sidebar">
    <div>
      <div class="item act">
        <span class="ic"><img src="../imagen/casita.png" alt="Inicio"></span>
        <span class="label">Inicio</span>
      </div>
      <div class="item">
        <span class="ic"><img src="../imagen/hoja.png" alt="Cursos"></span>
        <span class="label">Cursos</span>
      </div>
      <div class="item">
        <span class="ic"><img src="../imagen/usuario.png" alt="Alumnos"></span>
        <span class="label">Alumnos</span>
      </div>
      <div class="item">
        <span class="ic"><img src="../imagen/mas.png" alt="Crear"></span>
        <span class="label"><a href="{{route('legajos.create')}}">Crear legajo</a></span>
      </div>
      <div id="salir" class="salir">
      <span class="ic"><img src="../imagen/puerta.png" ></span>
      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#cierre">Cerrar Sesion</button>
      </div>
    </div>
  </div>
  <div class="contenido"> 
  <div class="form-header">
        <div class="titulo-wrap">
            <div>
                <h2>Crear nuevo Legajo</h2>
                <p>Complete los datos correspondientes para dar de alta al alumno en el sistema.</p>
                
            </div>
        </div>
        <button type="button" class="btn-volver" onclick="window.history.back()">
             Volver
        </button>
    </div>

    <!-- Tarjeta Principal del Formulario -->
    
    <form action="{{route('legajos.store')}}" method="POST" id="crear">
    @csrf
        <div class="legajo-card">
            <h2>Datos del Alumno/a</h2>
            <div class="legajo-card-top">
                <div class="avatar-generico">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="nombre-wrap">
                    <label for="nombre">Nombre/s<span class="req">*</span></label>
                    <input type="text" id="nombre" name="alumno[nombre]" class="input-nombre" required autocomplete="off">
                    <label for="apellido">Apellido/s<span class="req">*</span></label>
                    <input type="text" id="apellido" name="alumno[apellido]" class="input-nombre" required autocomplete="off">
                </div>
            </div>

            <!-- Filas del formulario con íconos estilo ficha de alumno -->
            
            <!-- DNI -->
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-address-card"></i></span>
                <label for="dni">DNI <span class="req">*</span></label>
                <input type="text" id="dni" name="alumno[dni]" placeholder="Sin puntos o espacios" required>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-graduation-cap"></i></span>
                <label for="curso">Curso <span class="req">*</span></label>
                <select id="curso" name="alumno[curso]" required>
                    <option value="" disabled selected>Seleccione un curso...</option>
                    <option value="1°">1°</option>
                    <option value="2°">2°</option>
                    <option value="3°">3°</option>
                    <option value="4°">4°</option>
                    <option value="5°">5°</option>
                    <option value="6°">6°</option>
                </select>
            </div>

            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-graduation-cap"></i></span>
                <label for="curso">Division <span class="req">*</span></label>
                <select id="division" name="alumno[division]" required>
                    <option value="" disabled selected>Seleccione una division...</option>
                    <option value="1°">1°</option>
                    <option value="2°">2°</option>
                    <option value="3°">3°</option>
                    <option value="4°">4°</option>
                    <option value="5°">5°</option>
                    <option value="6°">6°</option>
                </select>
            </div>
            <!-- Fecha de Nacimiento -->
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-calendar-days"></i></span>
                <label for="fecha_nacimiento">F. Nacimiento <span class="req">*</span></label>
                <input type="date" id="fecha_nacimiento" name="alumno[fecha_nacimiento]" required>
            </div>


            <!-- Teléfono -->
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-phone"></i></span>
                <label for="telefono">Teléfono <span class="req">*</span></label>
                <input type="tel" id="telefono" name="alumno[telefono]" placeholder="Ej: 299 123-4567" required>
            </div>


            <!-- Email -->
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-envelope"></i></span>
                <label for="email">Email <span class="req">*</span></label>
                <input type="email" id="email" name="alumno[email]" placeholder="Ej: alumno@example.com" required>
            </div>

            <!-- Opción: Viene de otra escuela -->
            <div class="otra-escuela-row">
                <div class="check-row">
                    <input type="checkbox" id="check_otra_escuela" name="check_otra_escuela" onchange="toggleOtraEscuela(this)">
                    <label for="check_otra_escuela">¿Proviene de otra institución?</label>
                </div>
                <input type="text" id="escuela_origen" name="alumno[escuela_origen]" placeholder="Nombre de la escuela de origen" style="display: none;">
            </div>

            <p class="form-hint">Los campos marcados con (<span class="req">*</span>) son obligatorios.</p>
        </div>
        <div class="padres-card">
        <div class="legajo-card">
            <h2>Datos de la Madre</h2>
            <div class="legajo-card-top">
                <div class="avatar-generico">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="nombre-wrap">
                    <label for="m_nombre">Nombre/s<span class="req">*</span></label>
                    <input type="text" id="m_nombre" name="madre[nombre]" class="input-nombre" required autocomplete="off">
                    <label for="m_apellido">Apellido/s<span class="req">*</span></label>
                    <input type="text" id="m_apellido" name="madre[apellido]" class="input-nombre" required autocomplete="off">
                </div>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-address-card"></i></span>
                <label for="m_dni">DNI <span class="req">*</span></label>
                <input type="text" id="m_dni" name="madre[dni]" placeholder="Sin puntos o espacios" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-location-dot"></i></span>
                <label for="m_domicilio">Domicilio <span class="req">*</span></label>
                <input type="text" id="m_domicilio" name="madre[domicilio]" placeholder="Ej: Av. Argentina 123, Neuquén" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-phone"></i></span>
                <label for="m_telefono">Teléfono <span class="req">*</span></label>
                <input type="tel" id="m_telefono" name="madre[telefono]" placeholder="Ej: 299 123-4567" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-envelope"></i></span>
                <label for="m_email">Email <span class="req">*</span></label>
                <input type="email" id="m_email" name="madre[email]" placeholder="Ej: madre@example.com" required>
            </div>
            <p class="form-hint">Los campos marcados con (<span class="req">*</span>) son obligatorios.</p>
        </div>
        <div class="legajo-card">
            <h2>Datos del Padre</h2>
            <div class="legajo-card-top">
                <div class="avatar-generico">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="nombre-wrap">
                    <label for="p_nombre">Nombre/s<span class="req">*</span></label>
                    <input type="text" id="p_nombre" name="padre[nombre]" class="input-nombre" required autocomplete="off">
                    <label for="p_apellido">Apellido/s<span class="req">*</span></label>
                    <input type="text" id="p_apellido" name="padre[apellido]" class="input-nombre" required autocomplete="off">
                </div>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-address-card"></i></span>
                <label for="p_dni">DNI <span class="req">*</span></label>
                <input type="text" id="p_dni" name="padre[dni]" placeholder="Sin puntos o espacios" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-location-dot"></i></span>
                <label for="p_domicilio">Domicilio <span class="req">*</span></label>
                <input type="text" id="p_domicilio" name="padre[domicilio]" placeholder="Ej: Av. Argentina 123, Neuquén" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-phone"></i></span>
                <label for="p_telefono">Teléfono <span class="req">*</span></label>
                <input type="tel" id="p_telefono" name="padre[telefono]" placeholder="Ej: 299 123-4567" required>
            </div>
            <div class="campo-icono-form">
                <span class="ic"><i class="fa-solid fa-envelope"></i></span>
                <label for="p_email">Email <span class="req">*</span></label>
                <input type="email" id="p_email" name="padre[email]" placeholder="Ej: padre@example.com" required>
            </div>
            <p class="form-hint">Los campos marcados con (<span class="req">*</span>) son obligatorios.</p>
        </div>
        </div>
        <!-- Botón para guardar -->
            <button type="submit" class="btn-guardar-legajo">
                <i class="fa-solid fa-floppy-disk"></i> Guardar Datos
            </button>
    </form>    

    
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
        var sidebar = document.getElementById('sidebar');
        var btnMenu = document.getElementById('btnMenu');
        sidebar.classList.add('colapsada');
        btnMenu.addEventListener('click', function() {
             sidebar.classList.toggle('colapsada');
         });

        function toggleOtraEscuela(checkbox) {
            const inputEscuela = document.getElementById('escuela_origen');
            if (checkbox.checked) {
                inputEscuela.style.display = 'block';
                inputEscuela.focus();
            } else {
                inputEscuela.style.display = 'none';
                inputEscuela.value = '';
            }
        }
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>