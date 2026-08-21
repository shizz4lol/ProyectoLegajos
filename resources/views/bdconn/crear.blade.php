<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>LEGAJOS - EPET N°20 - Crear Legajo</title>
<link rel="stylesheet" href="legajo.css">
<link rel="stylesheet" href="legajo-form.css">
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
      <div class="item">
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
      <div class="item act">
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

    <div class="form-header">
      <div class="titulo-wrap">
        <div class="icono-cuadrado">&#127891;</div>
        <div>
          <h2>Crear nuevo Legajo</h2>
          <p>Cargá los datos del alumno recopilados de la planilla física</p>
        </div>
      </div>
      <button class="btn-volver">&#8592; Volver</button>
    </div>

    <form class="legajo-card">

      <div class="legajo-card-top">
        <div class="avatar-generico">&#128100;</div>
        <div class="nombre-wrap">
          <label>Apellido y Nombre <span class="req">*</span></label>
          <input class="input-nombre" type="text" id="nfNombre" placeholder="Ej: Pérez Juan">
        </div>
        <span class="badge-estado">Activo</span>
      </div>

      <div class="campo-icono-form">
        <span class="ic">&#128274;</span>
        <label>DNI <span class="req">*</span></label>
        <input type="text" id="nfDni" placeholder="45.123.456">
      </div>

      <div class="campo-icono-form">
        <span class="ic">&#127891;</span>
        <label>Curso <span class="req">*</span></label>
        <select id="nfCurso">
          <option value="" selected disabled>Seleccione un curso</option>
          <option>1° 1° - Mañana</option>
          <option>1° 2° - Tarde</option>
          <option>2° 1° - Mañana</option>
          <option>2° 2° - Tarde</option>
          <option>3° 1° - Mañana</option>
          <option>3° 2° - Tarde</option>
          <option>4° 1° - Vespertino</option>
          <option>5° 1° - Vespertino</option>
          <option>6° 3° - Vespertino</option>
        </select>
      </div>

      <div class="campo-icono-form">
        <span class="ic">&#128197;</span>
        <label>Nacimiento</label>
        <input type="date" id="nfNacimiento">
      </div>

      <div class="campo-icono-form">
        <span class="ic">&#128205;</span>
        <label>Domicilio <span class="req">*</span></label>
        <input type="text" id="nfDireccion" placeholder="Calle y número, localidad">
      </div>

      <div class="campo-icono-form">
        <span class="ic">&#128222;</span>
        <label>Teléfono <span class="req">*</span></label>
        <input type="text" id="nfTel" placeholder="299 123-4567">
      </div>

      <div class="campo-icono-form">
        <span class="ic">&#128100;</span>
        <label>Tutor <span class="req">*</span></label>
        <input type="text" id="nfTutor" placeholder="Ej: María Pérez (Madre)">
      </div>

      <div class="campo-icono-form">
        <span class="ic">&#9993;</span>
        <label>Email</label>
        <input type="email" id="nfEmail" placeholder="alumno@example.com">
      </div>

      <div class="otra-escuela-row">
        <div class="check-row">
          <input type="checkbox" id="nfOtraEscuelaCheck">
          <label for="nfOtraEscuelaCheck" style="min-width:auto;">El alumno proviene de otra escuela</label>
        </div>
        <input type="text" id="nfEscuelaOrigen" placeholder="Escuela de origen (opcional)">
      </div>

      <div class="form-hint"><span class="req">*</span> Campos obligatorios del alumno y del adulto responsable.</div>

      <button type="submit" class="btn-guardar-legajo">Guardar Legajo</button>
    </form>

  </div>
</div>

<script>
  document.getElementById('btnMenu').addEventListener('click', function(){
    document.getElementById('sidebar').classList.toggle('colapsada');
  });
</script>

</body>
</html>