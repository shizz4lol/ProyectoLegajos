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
  <form action="{{ route('legajos.prece') }}" method="POST">
    <h2>Seleccione curso a visualizar:</h2>
    <div class="login-field">
    <label for="curso">Curso <span class="req">*</span></label>
    <select id="curso" name="prece[curso]" required>
                    <option value="" disabled selected>Seleccione un curso...</option>
                    <option value="1°">1°</option>
                    <option value="2°">2°</option>
                    <option value="3°">3°</option>
                    <option value="4°">4°</option>
                    <option value="5°">5°</option>
                    <option value="6°">6°</option>
    </select>
    <label for="curso">Division <span class="req">*</span></label>
    <select id="division" name="prece[division]" required>
        <option value="" disabled selected>Seleccione una division...</option>
        <option value="1°">1°</option>
        <option value="2°">2°</option>
        <option value="3°">3°</option>
        <option value="4°">4°</option>
        <option value="5°">5°</option>
        <option value="6°">6°</option>
    </select>
    </div>
   <input type="submit" class="login-btn" value="Ingresar">
  </form>
  <p id="error">{{ session('error') }}</p>
</div>

</body>
</html>