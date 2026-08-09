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
      <input type="text" placeholder="Rol" name="tipo_rol">
      <span class="icono">&#128274;</span>
    </div>
  <div class="login-field">
    <input type="password" placeholder="Ingrese su clave" name="password">
    <span class="icono">&#128274;</span>
  </div>
   <input type="submit" class="login-btn" value="Ingresar">

  <details class="login-demo">
    <summary>Acceder como (demo)</summary>
    <a href="/secretaria">→ Secretaría</a><br>
    <a href="jefe-preceptores.html">→ Jefe de Preceptores</a><br>
    <a href="preceptor.html">→ Preceptoría</a>
  </details>
  </form>
  <p id="error">{{ session('error') }}</p>
</div>

</body>
</html>
