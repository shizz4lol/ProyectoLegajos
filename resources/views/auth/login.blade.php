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

    <div id="gorro">
      <img src="/imagen/gorro.png">
    </div>

    <div class="txt">
      <b>LEGAJOS</b>
      <span>EPET N°20</span>
    </div>

  </div>

</header>


<div class="login-wrap">

  <form action="{{ route('validar') }}" method="POST">

    @csrf

    <h2>Inicio de sesión</h2>


    <div class="login-field">

      <input
        type="text"
        placeholder="Nombre de usuario"
        name="nombre"
        autocomplete="off"
      >

    </div>


    <div class="login-field password-field">

      <input
        type="password"
        id="password"
        placeholder="Ingrese su clave"
        name="password"
        autocomplete="off"
      >

      <button
        type="button"
        id="mostrarPassword"
        class="btn-mostrar-password"
        aria-label="Mostrar contraseña"
      >

        <svg
          id="iconoPassword"
          xmlns="http://www.w3.org/2000/svg"
          width="18"
          height="18"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >

          <path
            d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"
          />

          <circle
            cx="12"
            cy="12"
            r="3"
          />

        </svg>

      </button>

    </div>


    <input
      type="submit"
      class="login-btn"
      value="Ingresar"
    >

  </form>


  <p id="error">{{ session('error') }}</p>

</div>


<script>

const password = document.getElementById("password");
const botonPassword = document.getElementById("mostrarPassword");
const iconoPassword = document.getElementById("iconoPassword");


botonPassword.addEventListener("click", function () {

    if (password.type === "password") {
        password.type = "text";

        botonPassword.setAttribute(
            "aria-label",
            "Ocultar contraseña"
        );
        iconoPassword.innerHTML = `
            <path d="M3 3l18 18"/>

            <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>

            <path d="M9.9 5.1A10.7 10.7 0 0 1 12 5
                     c7 0 10 7 10 7
                     a18.5 18.5 0 0 1-3.1 4.2"/>

            <path d="M6.6 6.6C3.6 8.5 2 12 2 12
                     s3.5 7 10 7
                     c1.8 0 3.4-.5 4.7-1.2"/>
        `;

    } else {
        password.type = "password";

        botonPassword.setAttribute(
            "aria-label",
            "Mostrar contraseña"
        );

        iconoPassword.innerHTML = `
            <path d="M2 12s3.5-7 10-7
                     10 7 10 7
                     -3.5 7-10 7
                     S2 12 2 12z"/>

            <circle cx="12" cy="12" r="3"/>
        `;

    }

});

</script>

</body>
</html>