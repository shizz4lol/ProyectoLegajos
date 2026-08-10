<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>LEGAJOS - EPET N°20 - Ingresar</title>
<link rel="stylesheet" href="{{ asset('css/legajo.css') }}">
</head>
<body>

<header class="topbar">
  <div class="logo">
    <div class="escudo">🎓</div>
    <div class="txt"><b>LEGAJOS</b><span>EPET N°20</span></div>
  </div>
</header>

<div class="login-wrap">
  <form action="{{ route('validar') }}" method="POST">
    <h2>Ingrese clave</h2>
  <div class="login-field">
    <input type="password" placeholder="Ingrese su clave" name="password">
    <span class="icono">&#128274;</span>
  </div>

  <div class="login-rol">
    <label for="rol">Rol</label>
    <div class="select-wrap">
      <select id="rol" name="rol">
        <option value="" selected disabled>Seleccione un rol</option>
        <option value="secretaria">Secretaría</option>
        <option value="jefe">Jefe de Preceptores</option>
        <option value="preceptor">Preceptor</option>
      </select>
      <span class="icono">&#9662;</span>
    </div>
  </div>
   <input type="submit" class="login-btn" value="Ingresar">
  </form>
  <p id="error">{{ session('error') }}</p>
</div>

</body>
</html>
