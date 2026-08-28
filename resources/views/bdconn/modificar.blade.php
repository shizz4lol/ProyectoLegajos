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
    <div class="escudo"><img src="imagen/epet.jpg" alt="Escudo EPET 20"></div>
    <div class="txt"><b>LEGAJOS</b><span>EPET N°20</span></div>
  </div>

<label class="toggle-vacios">
  <input type="checkbox" id="toggleCamposVacios">
  Mostrar campos vacíos
</label>

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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
   <script>

    const btnMenu = document.getElementById('btnMenu');
    const sidebar = document.getElementById('sidebar');
    if (btnMenu && sidebar) {
        btnMenu.addEventListener('click', function () {
            sidebar.classList.toggle('cerrado');
        });
    }

    const items = document.querySelectorAll('.sidebar .item');
    items.forEach(function (item) {

        item.addEventListener('click', function () {

            const texto = item.querySelector('.label').textContent.trim();

            if (texto === 'Inicio') {
                window.location.href = 'inicio.html';
            }

            if (texto === 'Cursos') {
                window.location.href = 'cursos.html';
            }

            if (texto === 'Alumnos') {
                window.location.href = 'alumnos.html';
            }

            if (texto === 'Legajos Egresados') {
                window.location.href = 'legajos-egresados.html';
            }

            if (texto === 'Crear Legajo') {
                window.location.href = 'crear-legajo.html';
            }

        });

    });
    const salir = document.querySelector('.salir');

    if (salir) {
        salir.addEventListener('click', function (event) {

            event.preventDefault();

            window.location.href = 'login.html';

        });
    }
function actualizarCamposVacios(mostrarVacios) {
  document.querySelectorAll('.campo-icono-form').forEach(function (campo) {
    const control = campo.querySelector('input, select, textarea');
    if (!control) return;

    const valor = (control.value || '').trim();
    const estaVacio = valor === '';

    if (estaVacio && !mostrarVacios) {
      campo.classList.add('campo-oculto');
    } else {
      campo.classList.remove('campo-oculto');
    }
  });
}

document.addEventListener('DOMContentLoaded', function () {
  actualizarCamposVacios(false);

  const toggleVacios = document.getElementById('toggleCamposVacios');
  if (toggleVacios) {
    toggleVacios.addEventListener('change', function () {
      actualizarCamposVacios(toggleVacios.checked);
    });
  }
});
</script>
</body>
</html>