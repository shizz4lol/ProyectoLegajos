<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>LEGAJOS - EPET N°20 - Ingresar</title>
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
</head>
<body>

<header class="topbar">
  <div class="logo">
  <div id="gorro"><img src="/imagen/gorro.png"></div>
    <div class="txt"><b>LEGAJOS</b><span>EPET N°20</span></div>
  </div>
</header>

<div class="login-wrap">
  <form action="{{ route('validar') }}" method="POST">
    <h2>Inicio de sesion</h2>
    <div class="login-field">
      <input type="text" placeholder="Nombre de usuario" name="nombre" autocomplete="off">
    </div>
  <div class="login-field">
    <input type="password" placeholder="Ingrese su clave" name="password" autocomplete="off">
    <span class="icono">
      <button type="button" id="mostrarPassword" class="btn-mostrar-password" aria-label="Mostrar contraseña">
        <svg id="iconoPassword" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round"stroke-linejoin="round">
            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
      </button>
    </span>
  </div>
   <input type="submit" class="login-btn" value="Ingresar">
  </form>
  <p id="error">{{ session('error') }}</p>
</div>
<div class="login-field password-field">
    
</div>
</body>
</html>
