<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
<title>LEGAJOS - EPET N°20 - Crear Legajo</title>
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
</body>
</html>